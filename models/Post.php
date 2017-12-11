<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;


class Post extends ActiveRecord
{

    public $post_image;

    public static function tableName()
    {
        return '{{%post}}';
    }

    public function rules()
    {
        return [
            [['title', 'short_description', 'description', 'category_id'], 'required'],
            [['title', 'short_description', 'image'], 'string', 'max' => 255],
            [['category_id', 'user_id'], 'integer'],
            [['description'], 'string'],
            [['post_image'], 'file']
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Заголовок',
            'short_description' => 'Краткое описание',
            'description' => 'Полное описание',
            'category_id' => 'Категория',
            'post_image' => 'Фото поста',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }

}
