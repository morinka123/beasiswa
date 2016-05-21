<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prestasi_akademik_perpanjangan".
 *
 * @property integer $id
 * @property integer $registrasi_id
 * @property integer $juara
 * @property string $kompetisi
 * @property string $lingkup
 * @property string $tahun
 *
 * @property Registrasi $registrasi
 */
class PrestasiAkademikPerpanjangan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prestasi_akademik_perpanjangan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['registrasi_id', 'juara'], 'integer'],
            [['kompetisi', 'lingkup'], 'string', 'max' => 100],
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
            'juara' => 'Juara',
            'kompetisi' => 'Kompetisi',
            'lingkup' => 'Lingkup',
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
