<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Oadode;
use common\models\DescriptionOfGoods;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use Mpdf\Mpdf; #Php 7.0

/**
 * OadodeController controller
 */
class OadodeController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update','list','view'],
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $oadodes = \common\models\Oadode::find()
            ->select('oadode.*,description_of_goods.*,oadode.id as oadode_id')  // make sure same column name not there in both table
            ->leftJoin('description_of_goods', 'oadode.id = description_of_goods.business_id')
            ->asArray()
            ->all();

        $count = count($oadodes);
        $pagination = new Pagination(['totalCount' => $count, 'defaultPageSize' => 5]);

        return $this->render('index', ['oadodes' => $oadodes]);
    }

    public function actionCreate()
    {
        $oadode = new Oadode;
        $descGoods = new DescriptionOfGoods;
        $formData = Yii::$app->request->post();
        $formData_descGoods = Yii::$app->request->post();

        if($oadode->load($formData) && $oadode->validate())
        {
            if($formData['Oadode']['business_title'] = implode(',',$_POST['Oadode']['business_title']) != null){
                $formData['Oadode']['business_title'] = implode(',',$_POST['Oadode']['business_title']);
            }else{
                print_r("Select at least one");
            }
            
            if($formData['Oadode']['lang'][0] == 0){
                $formData['Oadode']['lang'] = 0;
            }else{
                $formData['Oadode']['lang'] = 1;
            }
            if ($formData['Oadode']['application_type'][0] == 2) {
                $formData['Oadode']['application_type'] = 2;
            }else{
                $formData['Oadode']['application_type'] = 1;
            } 
            $oadode->load($formData);
            //$descGoods->load($formData_descGoods);

            if($oadode->save())
            {
                $formData_descGoods['DescriptionOfGoods']['business_id'] = $oadode->id;
                $descGoods->load($formData_descGoods);
                $descGoods->save();
                Yii::$app->session->setFlash('success','Saved Business Successfully.!!');
                return $this->redirect(['create']);
            }else
            {
                Yii::$app->session->get('session')->setFlash('message','Something Wrong');
            }
        }
        return $this->render('create',['oadode'=>$oadode,'descGoods'=>$descGoods]);
    }

    public function actionUpdate($id)
    {
        $oadode = Oadode::find()
                ->where(['id'=>$id])                
                ->one();
        
        $descGoods = DescriptionOfGoods::find()
                ->where(['business_id'=>$oadode->id])
                ->one();

        $formData = Yii::$app->request->post();
        $formData_descGoods = Yii::$app->request->post();

        if($oadode->load($formData) && $oadode->validate())
        {
            if($formData['Oadode']['business_title'] = implode(',',$_POST['Oadode']['business_title']) != null){
                $formData['Oadode']['business_title'] = implode(',',$_POST['Oadode']['business_title']);
            }else{
                print_r("Select at least one");
            }
            
            if($formData['Oadode']['lang'][0] == 0){
                $formData['Oadode']['lang'] = 0;
            }else{
                $formData['Oadode']['lang'] = 1;
            }
            if ($formData['Oadode']['application_type'][0] == 2) {
                $formData['Oadode']['application_type'] = 2;
            }else{
                $formData['Oadode']['application_type'] = 1;
            } 
            $oadode->load($formData);
            if($oadode->save())
            {
                $formData_descGoods['DescriptionOfGoods']['business_id'] = $id;
                $descGoods->load($formData_descGoods);
                $descGoods->save();
                Yii::$app->session->setFlash('message','Update Post Successfully.!!');
                return $this->redirect(['index','id'=>$oadode->id]);
            }else
            {
                Yii::$app->session->get('session')->setFlash('message','Something Wrong');
            }
        }else
        {
            return $this->render('update',['oadode'=>$oadode,'descGoods'=>$descGoods]);
        }        
    }

    /*public function actionDelete($id)
    {
        $query = Oadode::find()
        ->select('oadode.*, description_of_goods.*')
        ->rightJoin('description_of_goods', 'oadode.id = description_of_goods.business_id')
                ->where(['oadode.id'=>$id])
                 ->one();
    
        if($query->delete())
        {
            return $this->redirect(['index']);
        }
    }*/


    public function actionCreateMPDF()
    {
        $mpdf = new mPDF();
        $mpdf->WriteHTML($this->renderPartial('mpdf'));
        $mpdf->Output();
        exit;
        //return $this->renderPartial('mpdf');
    }
    public function actionHello($id)
    {
        $queries = Oadode::find()
                ->where(['id'=>$id])                
                ->one();
        
        $descGoods = DescriptionOfGoods::find()
                ->where(['business_id'=>$queries->id])
                ->one();

        //$queries = Oadode::findOne($id);
        $mpdf = new mPDF;
        if($queries->lang == 1){
            $lang = "English";
        }else{
            $lang = "French";
        }

        if($queries->application_type == 1){  
            $application_type_variable = "New";
        }else if($queries->application_type != NULL) { 
            $application_type_variable = "Re-assesmentss";
        } else{
            $application_type_variable = "N/A";
        } 
                       
        $mpdf->WriteHTML('
            <div>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Legal Name</th>
                      <th scope="col">Name</th>
                      <th scope="col">Address</th>
                      <th scope="col">Mailing Address</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Fax</th>
                      <th scope="col">Email</th>
                      <th scope="col">Lang</th>
                      <th scope="col">Application Type</th>
                      <th scope="col">Business Title</th>
                      <th scope="col">Description</th>
                      <th scope="col">Ecl Group</th>
                      <th scope="col">Ecl Item</th>
                      <th scope="col">Created At</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">'.$queries->id.'</th>
                      <td>'.$queries->legal_name.'</td>
                      <td>'.$queries->business_name.'</td>
                      <td>'.$queries->business_address.'</td>
                      <td>'.$queries->business_mailing_address.'</td>
                      <td>'.$queries->business_phone.'</td>
                      <td>'.$queries->business_fax.'</td>
                      <td>'.$queries->business_email.'</td>
                      <td>'.$lang.'</td>
                      <td>'.$application_type_variable.'</td>
                      <td>'.$queries->id.'</td>
                      <td>'.$descGoods->description.'</td>
                      <td>'.$descGoods->ecl_group.'</td>
                      <td>'.$descGoods->ecl_item.'</td>
                      <td>'.date('Y-m-d H:i:s', strtotime('now')).'</td>
                    </tr>
                  </tbody>
                </table>
            </div>
            ');
        $mpdf->Output();
        exit;
    }
    public function actionDownload($id)
    {
        $tempPath = dirname(__DIR__).'/views/oadode/webfolder/';
        $queries = Oadode::find()
                ->where(['id'=>$id])                
                ->one();
        
        $descGoods = DescriptionOfGoods::find()
                ->where(['business_id'=>$queries->id])
                ->one();
        $mpdf = new mPDF;
        if($queries->lang == 1){
            $lang = "English";
        }else{
            $lang = "French";
        }

        if($queries->application_type == 1){  
            $application_type_variable = "New";
        }else if($queries->application_type != NULL) { 
            $application_type_variable = "Re-assesmentss";
        } else{
            $application_type_variable = "N/A";
        } 
        $mpdf->WriteHTML('
                 <div>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Legal Name</th>
                      <th scope="col">Name</th>
                      <th scope="col">Address</th>
                      <th scope="col">Mailing Address</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Fax</th>
                      <th scope="col">Email</th>
                      <th scope="col">Lang</th>
                      <th scope="col">Application Type</th>
                      <th scope="col">Business Title</th>
                      <th scope="col">Description</th>
                      <th scope="col">Ecl Group</th>
                      <th scope="col">Ecl Item</th>
                      <th scope="col">Created At</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">'.$queries->id.'</th>
                      <td>'.$queries->legal_name.'</td>
                      <td>'.$queries->business_name.'</td>
                      <td>'.$queries->business_address.'</td>
                      <td>'.$queries->business_mailing_address.'</td>
                      <td>'.$queries->business_phone.'</td>
                      <td>'.$queries->business_fax.'</td>
                      <td>'.$queries->business_email.'</td>
                      <td>'.$lang.'</td>
                      <td>'.$application_type_variable.'</td>
                      <td>'.$queries->id.'</td>
                      <td>'.$descGoods->description.'</td>
                      <td>'.$descGoods->ecl_group.'</td>
                      <td>'.$descGoods->ecl_item.'</td>
                      <td>'.date('Y-m-d H:i:s', strtotime('now')).'</td>
                    </tr>
                  </tbody>
                </table>
            </div>
            ');
        //$mpdf->Output($queries->legal_name.'pdf', $tempPath);
        $name = $queries->legal_name.'.pdf';
        $mpdf->Output($tempPath . $name, \Mpdf\Output\Destination::FILE);
        return $this->redirect(['index']);
        exit;
    }
    
}
