<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alasan_layak_perpanjangan".
 *
 * @property integer $id
 * @property integer $registrasi_id
 * @property string $alasan
 *
 * @property Registrasi $registrasi
 */
class AlasanLayakPerpanjangan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'alasan_layak_perpanjangan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'registrasi_id'], 'integer'],
            [['alasan'], 'string']
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
            'alasan' => 'Alasan',
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
