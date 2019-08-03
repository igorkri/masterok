<?php
namespace app\rbac;
use yii\rbac\Rule;
/**
* Class AuthorRule.
* @package app\rbac
*/
class AuthorRule extends Rule
{
    public $name = 'isAuthor';
    /**
    * @param int|string $user
    * @param \yii\rbac\Item $item
    * @param array $params
    *
    * @return bool
    */
    public function execute($user, $item, $params)
    {
        return isset($params['post']) ? $params['post']->createdBy == $user : false;
    }
}