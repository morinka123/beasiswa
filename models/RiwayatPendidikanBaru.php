<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "riwayat_pendidikan_baru".
 *
 * @property integer $id
 * @property integer $registrasi_id
 * @property integer $pendidikan_id
 * @property string $thn_masuk
 * @property string $thn_lulus
 * @property string $nama_sekolah
 * @property string $nilai
 *
 * @property Pendidikan $pendidikan
 * @property Registrasi $registrasi
 */
class RiwayatPendidikanBaru extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'riwayat_pendidikan_baru';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['registrasi_id', 'pendidikan_id'], 'integer'],
            [['nilai'], 'number'],
            [['nilai'], 'string','max'=> 3],
            [['thn_masuk', 'thn_lulus'], 'integer', 'max' => 4]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'registrasi_id' => 'Registrasi ID',
            'pendidikan_id' => 'Pendidikan ID',
            'thn_masuk' => 'Thn Masuk',
            'thn_lulus' => 'Thn Lulus',
            'nama_sekolah' => 'Nama Sekolah',
            'nilai' => 'Nilai',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendidikan()
    {
        return $this->hasOne(Pendidikan::className(), ['id' => 'pendidikan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistrasi()
    {
        return $this->hasOne(Registrasi::className(), ['id' => 'registrasi_id']);
    }
}
