<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "registrasi".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $status
 * @property integer $tahun
 *
 * @property AlasanLayakPerpanjangan[] $alasanLayakPerpanjangans
 * @property BiayaPerpanjangan[] $biayaPerpanjangans
 * @property DokumenPrpnjgan[] $dokumenPrpnjgans
 * @property FasilitasPerpanjangan[] $fasilitasPerpanjangans
 * @property KegiatanKemahasiswaanPerpanjangan[] $kegiatanKemahasiswaanPerpanjangans
 * @property PemasukanLainPerpanjangan[] $pemasukanLainPerpanjangans
 * @property PrestasiAkademikPerpanjangan[] $prestasiAkademikPerpanjangans
 * @property User $user
 * @property RiwayatBeasiswaLain[] $riwayatBeasiswaLains
 * @property RiwayatIpkPerpanjangan[] $riwayatIpkPerpanjangans
 * @property RiwayatPendidikanBaru[] $riwayatPendidikanBarus
 */
class RegistrasiOri extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'registrasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'tahun'], 'integer'],
            [['status_beasiswa'], 'string']
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
            'status_beasiswa' => 'Status Beasiswa',
            'tahun' => 'Tahun',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlasanLayakPerpanjangans()
    {
        return $this->hasMany(AlasanLayakPerpanjangan::className(), ['register_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBiayaPerpanjangans()
    {
        return $this->hasMany(BiayaPerpanjangan::className(), ['register_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumenPrpnjgans()
    {
        return $this->hasMany(DokumenPrpnjgan::className(), ['register_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFasilitasPerpanjangans()
    {
        return $this->hasMany(FasilitasPerpanjangan::className(), ['registrasi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKegiatanKemahasiswaanPerpanjangans()
    {
        return $this->hasMany(KegiatanKemahasiswaanPerpanjangan::className(), ['registrasi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPemasukanLainPerpanjangans()
    {
        return $this->hasMany(PemasukanLainPerpanjangan::className(), ['registrasi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrestasiAkademikPerpanjangans()
    {
        return $this->hasMany(PrestasiAkademikPerpanjangan::className(), ['registrasi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRiwayatBeasiswaLains()
    {
        return $this->hasMany(RiwayatBeasiswaLain::className(), ['registrasi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRiwayatIpkPerpanjangans()
    {
        return $this->hasMany(RiwayatIpkPerpanjangan::className(), ['registrasi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRiwayatPendidikanBarus()
    {
        return $this->hasMany(RiwayatPendidikanBaru::className(), ['registrasi_id' => 'id']);
    }
}
