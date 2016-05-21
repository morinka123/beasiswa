<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kegiatan_kemahasiswaan_perpanjangan".
 *
 * @property integer $id
 * @property integer $registrasi_id
 * @property string $nama_organisasi
 * @property string $posisi
 * @property string $tahun
 *
 * @property Registrasi $registrasi
 */
class KegiatanKemahasiswaanPerpanjangan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kegiatan_kemahasiswaan_perpanjangan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['registrasi_id'], 'integer'],
            [['nama_organisasi', 'posisi'], 'string', 'max' => 100],
            [['tahun'], 'integer', 'max' => 4]
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
            'nama_organisasi' => 'Nama Organisasi',
            'posisi' => 'Posisi',
            'tahun' => 'Tahun',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistrasi()
    {
        return $this->hasOne(Registrasi::className(), ['id' => 'registrasi_id']);
    }
}
