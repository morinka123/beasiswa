<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "informasi_penerima".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $nama
 * @property string $nim
 * @property string $fakultas
 * @property string $kategori
 *
 * @property User $id0
 */
class InformasiPenerima extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'informasi_penerima';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['nim', 'fakultas'], 'string'],
            [['nama', 'kategori'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'nama' => 'Nama',
            'nim' => 'Nim',
            'fakultas' => 'Fakultas',
            'kategori' => 'Kategori',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }
}
