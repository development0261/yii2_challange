<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class DescriptionOfGoods extends ActiveRecord
{
	public static function tableName()
    {
        return 'description_of_goods';
    }

	public function rules()
	{
		return [
			// username and password are both required
			[
				['description','ecl_group','ecl_item','business_id'],
				'required'],
		];
	}

	public function getBusiness()
    {
        return $this->hasOne(Oadode::className(), ['id' => 'business_id']);
    }
}