<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "riwayat_beasiswa_lain".
 *
 * @property integer $id
 * @property integer $registrasi_id
 * @property string $sumber
 * @property string $nominal
 * @property string $periode
 *
 * @property Registrasi $registrasi
 */
class RiwayatBeasiswaLain extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'riwayat_beasiswa_lain';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['registrasi_id'], 'integer'],
            [['nominal'], 'number'],
            [['sumber'], 'string', 'max' => 50],
            [['periode'], 'integer', 'max' => 4]
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
            'sumber' => 'Sumber',
            'nominal' => 'Nominal',
            'periode' => 'Periode',
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
