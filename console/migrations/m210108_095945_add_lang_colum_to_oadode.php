<?php

use yii\db\Migration;

/**
 * Class m210108_095945_add_lang_colum_to_oadode
 */
class m210108_095945_add_lang_colum_to_oadode extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('oadode', 'lang', $this->integer()->defaultValue(1));
        $this->addColumn('oadode', 'application_type', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('oadode', 'lang');
        $this->dropColumn('oadode', 'application_type');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210108_095945_add_lang_colum_to_oadode cannot be reverted.\n";

        return false;
    }
    */
}
