<?php

use yii\db\Schema;
use yii\db\Migration;

class m150613_125045_load_test_datas_p_orientation extends Migration
{
    public function up()
    {
		$this->insert('p_orientation', array(
			'id' => 1,
			'name' => 'assistant',
		));

		$this->insert('p_orientation', array(
			'id' => 2,
			'name' => 'electrical engineer',
		));

		$this->insert('p_orientation', array(
			'id' => 3,
			'name' => 'fisherman',
		));

		$this->insert('p_orientation', array(
			'id' => 4,
			'name' => 'programmer',
		));

		$this->insert('p_orientation', array(
			'id' => 5,
			'name' => 'driver',
		));

		$this->insert('p_orientation', array(
			'id' => 6,
			'name' => 'cook',
		));
    }

    public function down()
    {
        echo "m150613_125045_load_test_datas_p_orientation cannot be reverted.\n";

        return false;
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
