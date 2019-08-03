<?php

use yii\db\Schema;
use yii\db\Migration;
/**
 * Handles the creation of table `user`.
 */
class m181229_174752_create_user_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%user}}', [
            'id' => Schema::TYPE_PK,
            'username' => Schema::TYPE_STRING .	' NOT NULL',
            'auth_key' => Schema::TYPE_STRING .	'(32) NOT NULL',
            'password_hash' => Schema::TYPE_STRING .	' NOT NULL',
            'password_reset_token' => Schema::TYPE_STRING,
        ], $tableOptions);
    }
    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}