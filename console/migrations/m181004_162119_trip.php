<?php

use yii\db\Migration;

/**
 * Class m181004_162119_trip
 */
class m181004_162119_trip extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%trip}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer(),
            'date' => $this->integer(),
            'driver' => $this->integer(),
            'user_id' => $this->integer(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%trip}}');
        
        return true;
    }
}
