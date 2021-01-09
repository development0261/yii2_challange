<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class Oadode extends ActiveRecord
{
	public static function tableName()
    {
        return 'oadode';
    }

	public function rules()
	{
		return [
			// username and password are both required
			[
				['legal_name','business_name','business_address','business_mailing_address','business_phone','business_email','application_type','lang','business_title','business_fax'],
				'required'],
		];
	}
}