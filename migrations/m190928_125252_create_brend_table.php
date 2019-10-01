<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%brend}}`.
 */
class m190928_125252_create_brend_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%brend}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'parent_bred_id' => $this->integer(),
        ]);

        $this->createIndex('idx-brend-parent_brend_id', '{{%brend}}', 'parent_bred_id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%brend}}');
    }
}
