<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bank".
 *
 * @property integer $id
 * @property string $nama_bank
 */
class Bank extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bank';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_bank'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_bank' => 'Nama Bank',
        ];
    }
}
