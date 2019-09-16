<?php

use yii\db\Migration;

/**
 * Class m190913_125718_categories
 */
class m190913_125718_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('categories',
            [
                'id' => 'pk',
                'parent_id' => $this->integer(5),
                'name' => $this->string(255)->notNull(),
                'remark' => $this->string(1000),
                
            ]   
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190913_125718_categories cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190913_125718_categories cannot be reverted.\n";

        return false;
    }
    */
}
