<?php

use yii\db\Schema;
use yii\db\Migration;

class m150613_123538_create_table_p_orientation extends Migration
{
    public function up()
    {
		$this->createTable('p_orientation', array(
			'id' => 'pk',
			'name' => 'VARCHAR(128)',
		));
    }

    public function down()
    {
        echo "m150613_124838_create_table_p_orientation cannot be reverted.\n";

        return false;
    }
}
