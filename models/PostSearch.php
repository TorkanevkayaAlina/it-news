<?php
namespace app\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class PostSearch extends Post
{

    public $search;
    public $category;

    public function rules()
    {
        return [
            [['search', 'category'], 'safe'],
        ];
    }


    public function search($params)
    {
        $query = Post::find()->orderBy(['created_at' => SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->JoinWith(['user', 'category', 'tags']);

        if(!empty($this->search) || !empty($this->category)){
            $query->andFilterWhere(['like', 'post.title', $this->search])
                ->orFilterWhere(['like', 'short_description', $this->search])
                ->orFilterWhere(['like', 'description', $this->search])
                ->orFilterWhere(['like', 'tag.name', $this->search])
                ->orWhere(['category_id' => $this->category]);
        }

        return $dataProvider;
    }
}