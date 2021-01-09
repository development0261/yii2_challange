<?php

use yii\db\Migration;

class m201222_020118_create_table_description_of_goods extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%description_of_goods}}',
            [
                'id' => $this->primaryKey(),
                'application_id' => $this->integer(),
                'customer_id' => $this->integer(),
                'user_id' => $this->integer(),
                'description' => $this->string(),
                'ecl_group' => $this->string(),
                'ecl_item' => $this->string(),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%description_of_goods}}');
    }
}
