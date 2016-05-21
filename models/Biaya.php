<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "biaya".
 *
 * @property integer $id
 * @property string $nama_biaya
 */
class Biaya extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'biaya';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_biaya'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_biaya' => 'Nama Biaya',
        ];
    }
}
