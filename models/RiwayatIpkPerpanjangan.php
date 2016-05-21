<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "riwayat_ipk_perpanjangan".
 *
 * @property integer $id
 * @property integer $registrasi_id
 * @property string $ip_1
 * @property string $ip_2
 * @property string $ipk_saat_ini
 *
 * @property Registrasi $registrasi
 */
class RiwayatIpkPerpanjangan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'riwayat_ipk_perpanjangan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['registrasi_id'], 'integer'],
            [['ip_1', 'ip_2', 'ipk_saat_ini'], 'number']
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
            'ip_1' => 'Ip 1',
            'ip_2' => 'Ip 2',
            'ipk_saat_ini' => 'Ipk Saat Ini',
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
