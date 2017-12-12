<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;


class PostToTag extends ActiveRecord
{

    public static function tableName()
    {
        return '{{%post_to_tag}}';
    }

    public function rules()
    {
        return [
            [['post_id', 'tag_id'], 'integer']
        ];
    }

    public function getTag()
    {
        return $this->hasOne(Tag::className(), ['id' => 'tag_id']);
    }


}
