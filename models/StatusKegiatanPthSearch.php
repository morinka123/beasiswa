<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StatusKegiatanPth;

/**
 * StatusKegiatanPthSearch represents the model behind the search form about `app\models\StatusKegiatanPth`.
 */
class StatusKegiatanPthSearch extends StatusKegiatanPth
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['user_id', 'nama_kegiatan', 'kelompok', 'nama_penerima', 'alamat', 'tgl_penyaluran', 'tgl_pengembalian', 'status_penyaluran'], 'safe'],
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
        $query = StatusKegiatanPth::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('user');

        $query->andFilterWhere([
            'id' => $this->id,
            'tgl_penyaluran' => $this->tgl_penyaluran,
            'tgl_pengembalian' => $this->tgl_pengembalian,
        ]);

        $query->andFilterWhere(['like', 'nama_kegiatan', $this->nama_kegiatan])
            ->andFilterWhere(['like', 'kelompok', $this->kelompok])
            ->andFilterWhere(['like', 'nama_penerima', $this->nama_penerima])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'status_penyaluran', $this->status_penyaluran])
            ->andFilterWhere(['like', 'user.nama', $this->user_id]);

        return $dataProvider;
    }
}
