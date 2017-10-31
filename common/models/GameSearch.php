<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Game;

/**
 * GameSearch represents the model behind the search form about `common\models\Game`.
 */
class GameSearch extends Game
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category_id','type_id', 'status', 'like', 'created_by', 'updated_by', 'published_at', 'created_at', 'updated_at'], 'integer'],
            [['slug', 'title', 'body', 'view', 'embed_url', 'thumbnail_base_url', 'thumbnail_path', 'size'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Game::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->category_id,
            'type_id' => $this->type_id,
            'status' => $this->status,
            'like' => $this->like,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'published_at' => $this->published_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'body', $this->body])
            ->andFilterWhere(['like', 'view', $this->view])
            ->andFilterWhere(['like', 'embed_url', $this->embed_url])
            ->andFilterWhere(['like', 'thumbnail_base_url', $this->thumbnail_base_url])
            ->andFilterWhere(['like', 'thumbnail_path', $this->thumbnail_path])
            ->andFilterWhere(['like', 'size', $this->size]);

        return $dataProvider;
    }
}
