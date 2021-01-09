<?php

use yii\db\Migration;

class m201227_143823_create_table_oadode extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%oadode}}',
            [
                'id' => $this->primaryKey(),
                'application_id' => $this->integer(),
                'customer_id' => $this->integer(),
                'user_id' => $this->integer(),
                'legal_name' => $this->string(),
                'business_name' => $this->string(),
                'business_address' => $this->string(),
                'business_mailing_address' => $this->string(),
                'business_phone' => $this->string(),
                'business_fax' => $this->string(),
                'business_email' => $this->string(),
                'application_type' => $this->integer(),
                'business_title' => $this->string(),
            ],
            $tableOptions
        );

       
    }

    public function down()
    {
        $this->dropTable('{{%oadode}}');
    }
}
