<?php

use yii\db\Migration;

/**
 * Class m210109_060219_add_business_id_colum_to_description_of_goods
 */
class m210109_060219_add_business_id_colum_to_description_of_goods extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('description_of_goods', 'business_id', $this->integer());
        $this->addForeignKey('FK_oadode_to_description_of_goods', 'description_of_goods', 'business_id', 'oadode', 'id','CASCADE','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //echo "m210109_060219_add_business_id_colum_to_description_of_goods cannot be reverted.\n";
        $this->dropColumn('description_of_goods', 'business_id');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210109_060219_add_business_id_colum_to_description_of_goods cannot be reverted.\n";

        return false;
    }
    */
}
