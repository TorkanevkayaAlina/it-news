<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;


class Comment extends ActiveRecord
{

    public static function tableName()
    {
        return '{{%comment}}';
    }

}
