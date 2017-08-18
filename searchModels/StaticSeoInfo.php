<?php

namespace common\modules\staticSeoInfo\searchModels;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\staticSeoInfo\models\StaticSeoInfo as StaticSeoInfoModel;

/**
 * StaticSeoInfo represents the model behind the search form about `common\modules\staticSeoInfo\models\StaticSeoInfo`.
 */
class StaticSeoInfo extends StaticSeoInfoModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'active', 'type', 'status', 'doindex', 'dofollow', 'shown_on_menu', 'create_time', 'update_time', 'image_id', 'creator_id', 'updater_id'], 'integer'],
            [['name', 'route', 'heading', 'page_title', 'meta_title', 'meta_description', 'description', 'long_description', 'content', 'menu_label'], 'safe'],
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
        $query = StaticSeoInfoModel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'active' => $this->active,
            'type' => $this->type,
            'status' => $this->status,
            'doindex' => $this->doindex,
            'dofollow' => $this->dofollow,
            'shown_on_menu' => $this->shown_on_menu,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'image_id' => $this->image_id,
            'creator_id' => $this->creator_id,
            'updater_id' => $this->updater_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'route', $this->route])
            ->andFilterWhere(['like', 'heading', $this->heading])
            ->andFilterWhere(['like', 'page_title', $this->page_title])
            ->andFilterWhere(['like', 'meta_title', $this->meta_title])
            ->andFilterWhere(['like', 'meta_description', $this->meta_description])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'long_description', $this->long_description])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'menu_label', $this->menu_label]);

        return $dataProvider;
    }
}
