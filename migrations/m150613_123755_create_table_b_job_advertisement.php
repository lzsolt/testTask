<?php

use yii\db\Schema;
use yii\db\Migration;

class m150613_123755_create_table_b_job_advertisement extends Migration
{
    public function up()
    {
		$this->createTable('b_job_advertisement', array(
			'id' => 'pk',
			'name' => 'VARCHAR(128)',
			'created_at' => 'TIMESTAMP DEFAULT NOW() NOT NULL',
			'activated_at' => 'TIMESTAMP',
			'orientation_id' => 'INT NOT NULL',
			'email' => 'VARCHAR(128)',
			'status' => "ENUM('new', 'ready', 'active') DEFAULT 'new'",
		));

		$this->addForeignKey('fk__job_advertisement_orientation', 'b_job_advertisement', 'orientation_id', 'p_orientation', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        echo "m150613_123755_create_table_b_job_advertisement cannot be reverted.\n";

        return false;
    }
}
