<?php

use yii\db\Migration;

/**
 * Class m210107_120618_add_constraint_to_oadode
 */
class m210107_120618_add_constraint_to_oadode extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('FK_oadode_to_user', 'oadode', 'user_id', 'user', 'id','CASCADE','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //echo "m210107_120618_add_constraint_to_oadode cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210107_120618_add_constraint_to_oadode cannot be reverted.\n";

        return false;
    }
    */
}
