<?php

use yii\db\Migration;

/**
 * Handles the creation of table `customer`.
 */
class m190123_093241_create_customers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('customer', [
            'id' => $this->primaryKey(),
            'created_at'=>$this->date()->notNull(),
            'akt' => $this->integer(10)->notNull()->unique(),
            'appliances'=> $this->string(255)->notNull(),
            'sn_model' => $this->string(100),
            'repairs' => $this->string(255),
            'price' => $this->integer(10),
            'guarantee' => $this->integer(2),
            'phone' => $this->string(255)->notNull(),
            'material_price' => $this->integer(5),
            'repairs_price' => $this->integer(5),
            'address' => $this->string(255),
            'comment' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('customer');
    }
}
