<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dokumen_perpanjangan".
 *
 * @property integer $id
 * @property integer $register_id
 * @property integer $dokumen_id
 * @property string $nama_dokumen
 * @property string $upload_file
 *
 * @property Registrasi $register
 */
class DokumenPerpanjangan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dokumen_perpanjangan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['register_id', 'dokumen_id'], 'integer'],
            [['nama_dokumen', 'upload_file'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'register_id' => 'Register ID',
            'dokumen_id' => 'Dokumen ID',
            'nama_dokumen' => 'Nama Dokumen',
            'upload_file' => 'Upload File',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegister()
    {
        return $this->hasOne(Registrasi::className(), ['id' => 'register_id']);
    }
}
