<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%product}}`.
 */
class m190928_150010_add_position_column_to_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%product}}', 'parent_bred_id', $this->integer());
    
    
        $this->createIndex('idx-product-parent_brend_id', '{{%product}}', 'parent_bred_id');
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%product}}', 'parent_bred_id');
    }
}
