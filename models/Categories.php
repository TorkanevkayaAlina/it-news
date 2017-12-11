<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;


class Categories extends ActiveRecord
{

    public $cat_image;
    
    public static function tableName()
    {
        return '{{%categories}}';
    }

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['cat_image'], 'file'],
            [['image', 'title'], 'string', 'max' => 255]
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Название категории',
            'cat_image' => 'Фото категории',
        ];
    }

}
