<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Worker;

/**
 * WorkerSearch represents the model behind the search form about `app\models\Worker`.
 */
class WorkerSearch extends Worker
{
    public $group_id;
    public $skills_id;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
          [['is_present'], 'boolean'],
          [['group_id', 'skills_id'], 'integer'],
          [['last_name'], 'safe'],
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
        $query = Worker::find()->with(['groups', 'skills']);
        $query->joinWith(['workerGroups', 'workerSkills'], false);

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
          'is_present' => $this->is_present,
          'worker_group.group_id' => $this->group_id,
          'worker_skills.skills_id' => $this->skills_id,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
          ->andFilterWhere(['like', 'last_name', $this->last_name]);

        return $dataProvider;
    }
}
