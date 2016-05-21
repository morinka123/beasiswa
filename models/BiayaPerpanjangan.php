<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "biaya_perpanjangan".
 *
 * @property integer $id
 * @property integer $registrasi_id
 * @property integer $biaya_id
 * @property string $total
 *
 * @property Registrasi $registrasi
 */
class BiayaPerpanjangan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'biaya_perpanjangan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['registrasi_id', 'biaya_id'], 'integer'],
            [['total'], 'number']
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
            'biaya_id' => 'Biaya ID',
            'total' => 'Total',
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
