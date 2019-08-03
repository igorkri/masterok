<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 27.01.19
 * Time: 14:40
 */

namespace app\helpers;

use app\models\CustomerRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class PostHelper
{

    public static function statusList(): array
    {
        return [
            CustomerRecord::STATUS_WORK => 'В работе',
            CustomerRecord::STATUS_NOTICE => 'Уведомлен',
            CustomerRecord::STATUS_MAKE => 'Сделано',
            CustomerRecord::STATUS_NAIL => 'Забрали',
            CustomerRecord::STATUS_ORDER => 'Заказано зап',
        ];
    }

    public static function statusName($status): string
    {
        return ArrayHelper::getValue(self::statusList(), $status);
    }

    public static function statusLabel($status): string
    {
        switch ($status) {
            case CustomerRecord::STATUS_WORK:
                $class = 'adm-label label label-info';
                break;
            case CustomerRecord::STATUS_NOTICE:
                $class = 'adm-label label label-warning';
                break;
            case CustomerRecord::STATUS_MAKE:
                $class = 'adm-label label label-success';
                break;
            case CustomerRecord::STATUS_NAIL:
                $class = 'adm-label label label-default';
                break;
            case CustomerRecord::STATUS_ORDER:
                $class = 'adm-label label label-danger';
                break;
            default:
                $class = 'adm-label label label-default';
        }

        return Html::tag('span', ArrayHelper::getValue(self::statusList(), $status), [
            'class' => $class,
        ]);
    }
}