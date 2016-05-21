<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "informasi_wawancara".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $nama
 * @property string $tgl_wawancara
 * @property string $waktu
 * @property string $interviewer
 */
class InformasiWawancara extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'informasi_wawancara';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'user_id'], 'integer'],
            [['tgl_wawancara', 'waktu'], 'safe'],
            [['nama', 'interviewer'], 'string', 'max' => 50]
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
            'tgl_wawancara' => 'Tgl Wawancara',
            'waktu' => 'Waktu',
            'interviewer' => 'Interviewer',
        ];
    }

    public function getUserLolosTahapI()
    {
        return $this->hasMany(Registrasi::className(), ['user_id' => 'user_id'])
            ->where('status_pendaftaran = :param', [':param' => 'Lolos Tahap I']);           
    }
    public function getRegistrasi()
    {
        return $this->hasMany(Registrasi::className(), ['user_id' => 'user_id']);           
    }
}
