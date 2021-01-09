<?php
// use yii\helper\html;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
	<h3>Create Business Information</h3>
    <div class="body-content">
       <?php $form = ActiveForm::begin() ?>
       <div class="row">
       		<div  class="form-group">
       			<div class="col-lg-12">
       				<?= $form->field($oadode,'legal_name');?>
       			</div>
       		</div>
       </div>
       <div class="row">
       		<div  class="form-group">
       			<div class="col-lg-12">
       				<?= $form->field($oadode,'business_name');?>
       			</div>
       		</div>
       </div>

       <div class="row">
       		<div  class="form-group">
       			<div class="col-lg-12">
       				<?= $form->field($oadode,'business_address')->textarea(['rows' => '6']);?>
       			</div>
       		</div>
       </div>

       	<div class="row">
       		<div  class="form-group">
       			<div class="col-lg-12">
       				<?= $form->field($oadode,'business_mailing_address')->textarea(['rows' => '6']);?>
       			</div>
       		</div>
       	</div>

       	<div class="row">
       		<div class="form-group">
       			<div class="col-lg-6">
       				<?= $form->field($oadode, 'business_phone')->textInput(['type' => 'number']) ?>
       			</div>
      
       			<div class="col-lg-6">
       				<?= $form->field($oadode, 'business_fax')->textInput(['type' => 'number']) ?>
       			</div>
       		</div>
       	</div>

       	<div class="row">
       		<div  class="form-group">
       			<div class="col-lg-12">
       				<?= $form->field($oadode, 'business_email')->input('email') ?>
       			</div>
       		</div>
       	</div>

        <?= $form->field($descGoods, 'business_id')->hiddenInput(['value'=> 0])->label(false);?>
        
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($descGoods,'description');?>
            </div>

            <div class="col-md-6 row card">
                <div class="col-md-6">
                    <?= $form->field($descGoods,'ecl_group');?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($descGoods,'ecl_item');?>
                </div>
            </div>
        </div>

       	<div class="row">
          <div class="form-group">
            <div class="col-lg-12">
                    <?= $form->field($oadode, 'application_type')->checkboxList(['1'=>'New', '2'=>'Re-assessment']) ?>
            </div>
          </div>
        </div>

        <div class="row">
          <div  class="form-group">
            <div class="col-lg-12">
              <?= $form->field($oadode, 'business_title')
                  ->checkboxList([
                    'a' => 'Owner', 
                    'b' => 'Authorized Individual',
                    'c' => 'Designated Official',
                    'd' => 'Officer',
                    'e' => 'Director',
                    'f' => 'Employee'
              ]);?>
            </div>
          </div>
        </div>

        <div class="row">
          <div  class="form-group">
            <div class="col-lg-12">
              <?php echo $form->field($oadode, 'lang')
              ->checkboxList([
                '1' => 'English', 
                '0' => 'French'
              ]);?>
            </div>
          </div>
        </div>

    
       <div class="row">
       		<div  class="form-group">
       			<div class="col-lg-3">
       				<?= Html::submitButton('submit',['class'=>'btn btn-primary'])?>
       			</div>
       			<div class="col-lg-3">
       				<a href="<?php echo yii::$app->homeUrl;?>" class="btn btn-danger">Back</a>
       			</div>
       		</div>
       </div>

       <?php ActiveForm::end() ?>

    </div>
</div>