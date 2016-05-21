<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status_kegiatan_pth".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $nama_kegiatan
 * @property string $kelompok
 * @property string $alamat
 * @property string $tgl_penyaluran
 * @property string $tgl_pengembalian
 * @property string $status_penyaluran
 *
 * @property User $user
 */
class StatusKegiatanPth extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status_kegiatan_pth';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['nama_kegiatan', 'status_penyaluran'], 'string'],
            [['tgl_penyaluran', 'tgl_pengembalian'], 'safe'],
            [['kelompok'], 'string', 'max' => 3],
            [['nama_penerima'],'string','max'=>50],
            [['alamat'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'nama_kegiatan' => 'Nama Kegiatan',
            'kelompok' => 'Kelompok',
            'nama_penerima'=> 'Nama Penerima',
            'alamat' => 'Alamat',
            'tgl_penyaluran' => 'Tgl Penyaluran',
            'tgl_pengembalian' => 'Tgl Pengembalian',
            'status_penyaluran' => 'Status Penyaluran',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function beforeSave(){
        $this->tgl_penyaluran = date('d-m-Y', strtotime($this->tgl_penyaluran));
        $this->tgl_pengembalian = date('d-m-Y', strtotime($this->tgl_pengembalian));
        return true;
    }

    public function afterFind(){
        $this->tgl_penyaluran = date('d-m-Y', strtotime($this->tgl_penyaluran));
        $this->tgl_pengembalian = date('d-m-Y', strtotime($this->tgl_pengembalian));
        return true;
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
