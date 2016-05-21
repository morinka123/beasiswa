<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Registrasi;

/**
 * RegistrasiSearch represents the model behind the search form about `app\models\Registrasi`.
 */
class RegistrasiSearch extends Registrasi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','tahun'], 'integer'],
            [['user_id', 'status_beasiswa', 'ta', 'semester', 'status_pendaftaran'], 'safe'],
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
        $query = Registrasi::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        //$query->joinWith('user');

        $query->andFilterWhere([
            'id' => $this->id,
            'tahun' => $this->tahun,
        ]);

        $query->andFilterWhere(['like', 'status_beasiswa', $this->status_beasiswa])
            ->andFilterWhere(['like', 'ta', $this->ta])
            ->andFilterWhere(['like', 'semester', $this->semester])
            ->andFilterWhere(['like', 'status_pendaftaran', $this->status_pendaftaran])
            ->andFilterWhere(['like', 'user.nama', $this->user_id]);

        return $dataProvider;
    }
}
