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
 * @property string $ta
 * @property string $semester
 * @property string $status_pendaftaran
 *
 * @property AlasanLayakPerpanjangan[] $alasanLayakPerpanjangans
 * @property BiayaPerpanjangan[] $biayaPerpanjangans
 * @property DokumenBaru[] $dokumenBarus
 * @property DokumenPerpanjangan[] $dokumenPerpanjangans
 * @property Fasilitas[] $fasilitas
 * @property KegiatanKemahasiswaanPerpanjangan[] $kegiatanKemahasiswaanPerpanjangans
 * @property PemasukanLainPerpanjangan[] $pemasukanLainPerpanjangans
 * @property PrestasiAkademikPerpanjangan[] $prestasiAkademikPerpanjangans
 * @property User $user
 * @property RiwayatBeasiswaLain[] $riwayatBeasiswaLains
 * @property RiwayatIpkPerpanjangan[] $riwayatIpkPerpanjangans
 * @property RiwayatPendidikanBaru[] $riwayatPendidikanBarus
 */
class Registrasi extends \yii\db\ActiveRecord
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
            [['status_beasiswa', 'semester', 'status_pendaftaran'], 'string'],
            [['ta'], 'string', 'max' => 9]
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
            'ta' => 'Tahun Ajaran',
            'semester' => 'Semester',
            'status_pendaftaran' => 'Status Pendaftaran',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlasanLayakPerpanjangans()
    {
        return $this->hasMany(AlasanLayakPerpanjangan::className(), ['registrasi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBiayaPerpanjangans()
    {
        return $this->hasMany(BiayaPerpanjangan::className(), ['registrasi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumenBarus()
    {
        return $this->hasMany(DokumenBaru::className(), ['registrasi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumenPerpanjangans()
    {
        return $this->hasMany(DokumenPerpanjangan::className(), ['registrasi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFasilitas()
    {
        return $this->hasMany(Fasilitas::className(), ['registrasi_id' => 'id']);
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

     public function getUsername()
    {
        $model=$this->user;
        return $model?$model->nama:'';
    }


}
