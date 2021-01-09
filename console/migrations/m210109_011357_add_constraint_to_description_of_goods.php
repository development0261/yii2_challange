<?php

use yii\db\Migration;

/**
 * Class m210109_011357_add_constraint_to_description_of_goods
 */
class m210109_011357_add_constraint_to_description_of_goods extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
         $this->addForeignKey('FK_description_of_goods_to_oadode', 'description_of_goods', 'application_id', 'oadode', 'id','CASCADE','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //echo "m210109_011357_add_constraint_to_description_of_goods cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210109_011357_add_constraint_to_description_of_goods cannot be reverted.\n";

        return false;
    }
    */
}
