<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pendidikan".
 *
 * @property integer $id
 * @property string $nama_jenjang
 */
class Pendidikan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pendidikan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['nama_jenjang'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_jenjang' => 'Nama Jenjang',
        ];
    }
}
