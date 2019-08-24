<?php

use yii\db\Migration;

/**
 * Handles the creation of table `services`.
 */
class m181213_161238_create_services_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('services', [
            'id' => $this->primaryKey(),
            'id_service'=>$this->integer(10)->notNull(),
            'meta_key'=> $this->string(255),
            'meta_desk'=>$this->string(255)->notNull(),
            'title_slide'=>$this->string(255)->notNull(),
            'title'=>$this->string(255)->notNull(),
            'img_slide'=>$this->string(255)->notNull(),
            'title_page'=>$this->string(255)->notNull(),
            'text'=>$this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('services');
    }
}
