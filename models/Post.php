<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use cornernote\linkall\LinkAllBehavior;


class Post extends ActiveRecord
{
    public $tag_ids;
    public $post_image;

    public static function tableName()
    {
        return '{{%post}}';
    }

    public function behaviors()
    {
        return [
            LinkAllBehavior::className(),
        ];
    }

    public function rules()
    {
        return [
            [['title', 'short_description', 'description', 'category_id', 'tag_ids'], 'required'],
            [['title', 'short_description', 'image', 'facebook', 'twitter', 'google', 'instagram', 'pinterest'], 'string', 'max' => 255],
            [['category_id', 'user_id', 'f_status', 't_status', 'g_status', 'i_status', 'p_status'], 'integer'],
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
            'facebook' => 'Facebook ссылка',
            'twitter' => 'Twitter ссылка',
            'google' => 'G+ ссылка',
            'tag_ids' => 'Метки',
            'instagram' => 'Instagram ссылка',
            'pinterest' => 'Pinterest ссылка',
            'f_status' => 'Отображать Facebook',
            't_status' => 'Отображать Twitter',
            'g_status' => 'Отображать G+',
            'i_status' => 'Отображать Instagram',
            'p_status' => 'Отображать Pinterest'
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

    public function afterSave($insert, $changedAttributes)
    {
        $tags = [];
        foreach ($this->tag_ids as $tag_name) {
            $tag = Tag::getTagByName($tag_name);
            if ($tag) {
                $tags[] = $tag;
            }
        }
        $this->linkAll('tags', $tags);
        parent::afterSave($insert, $changedAttributes);
    }

    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])
            ->viaTable('post_to_tag', ['post_id' => 'id']);
    }

}
