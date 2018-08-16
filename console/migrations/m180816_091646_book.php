<?php

use yii\db\Migration;

/**
 * Class m180816_091646_book
 */
class m180816_091646_book extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%book}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'size' => $this->integer(),
            'author' => $this->string(255),
            'heading' => $this->string(255),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%book}}');
        
        return true;
    }
}
