<?php

use yii\db\Migration;

/**
 * Handles the creation of table `menus`.
 */
class m181213_161311_create_menus_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('menus', [
            'id' => $this->primaryKey(),
            'id_service'=>$this->integer(10),
            'link'=>$this->string(255),
            'name'=>$this->string(255),
            
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('menus');
    }
}
