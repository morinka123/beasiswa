<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenis_dokumen_perpanjangan".
 *
 * @property integer $id
 * @property string $jenis_dokumen
 */
class JenisDokumenPerpanjangan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jenis_dokumen_perpanjangan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['jenis_dokumen'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jenis_dokumen' => 'Jenis Dokumen',
        ];
    }
}
