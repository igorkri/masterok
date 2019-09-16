<?php

use yii\db\Migration;

/**
 * Class m190915_114453_products
 */
class m190915_114453_products extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products',
            [
                'id' => 'pk',
                'category_id' => $this->integer(5),
                'sku' => $this->string(255),
                'name' => $this->string(255)->notNull(),
                'content' => $this->text(),
                'price' => $this->float(),
                'price_sale' => $this->float(),
                'keywords' => $this->string(255),
                'description' => $this->string(255),
                'img' => $this->string(255)->defaultValue('no-image.png'),
                'hit' => "ENUM('0','1')",
                'new' => "ENUM('0','1')",
                'sale' => "ENUM('0','1')",
            ]   
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190915_114453_products cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190915_114453_products cannot be reverted.\n";

        return false;
    }
    */
}
