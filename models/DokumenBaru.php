<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dokumen_baru".
 *
 * @property integer $id
 * @property integer $registrasi_id
 * @property string $nama_dokumen
 * @property string $upload_file
 *
 * @property User $registrasi
 */
class DokumenBaru extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dokumen_baru';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['registrasi_id'], 'integer'],
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
            'registrasi_id' => 'Registrasi ID',
            'nama_dokumen' => 'Nama Dokumen',
            'upload_file' => 'Upload File',
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
