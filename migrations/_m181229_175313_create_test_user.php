<?php

use yii\db\Migration;
use app\models\User;

/**
 * Class m181229_175313_create_test_user
 */
class m181229_175313_create_test_user extends Migration
{
    public function up()
    { 
        
        
        $testUser = new User();
        $testUser->username = 'Admin';
        $testUser->setPassword('password');
        $testUser->generateAuthKey();
        $testUser->save();
if (!$testUser->save()) var_export($testUser->errors);
    }

    public function down()
    {
        $user = User::findByUsername('admin');
        $user ? $user->delete() : null;

        return true;
    }
}