<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fasilitas".
 *
 * @property integer $id
 * @property integer $registrasi_id
 * @property string $nama_barang
 * @property string $merek
 * @property string $series
 * @property string $tahun
 *
 * @property User $registrasi
 */
class Fasilitas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fasilitas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['registrasi_id'], 'integer'],
            [['nama_barang', 'merek', 'series'], 'string', 'max' => 50],
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
            'nama_barang' => 'Nama Barang',
            'merek' => 'Merek',
            'series' => 'Series',
            'tahun' => 'Tahun',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistrasi()
    {
        return $this->hasOne(User::className(), ['id' => 'registrasi_id']);
    }
}
