<?php

namespace app\models;



class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $fakultas_id;

    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
           
            [['email'], 'email'], 
            [['email'], 'required'], //email tidak boleh kosong
            [['email'], 'unique'], // email tidak boleh sama
            [['password'],'required'],
            //[['confirm_password'],'required'],
            [['jurusan_id', 'semester', 'agama_id', 'jml_saudara', 'bank_id'], 'integer'],
            [['gender','block'], 'string'],
            [['tanggal_lahir'], 'safe'],
            [['penghasilan_ayah', 'penghasilan_ibu', 'penghasilan_wali'], 'number'],
            [['alamat_asal', 'alamat_domisili'], 'string', 'max' => 100],
            [['tempat_lahir'], 'string', 'max' => 20],
            [['nama', 'nama_ayah', 'pekerjaan_ayah', 'nama_ibu', 'pekerjaan_ibu', 'nama_wali', 'pekerjaan_wali'], 'string', 'max' => 50],
            [['nim'], 'string', 'max' => 50],
            [['no_rek'], 'string', 'max' => 20],
            [['no_hp'], 'string','min'=>12,'max' =>12],

        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'email' => 'Email',
            'password' => 'Password',
            'confirm_password' => 'Konfirmasi',
            'gender' => 'Gender',
            'nim' => 'Nim',
            'semester' => 'Semester',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'alamat_asal' => 'Alamat Asal',
            'alamat_domisili' => 'Alamat Domisili',
            'no_hp' => 'No Hp',
            'agama_id' => 'Agama ID',
            'nama_ayah' => 'Nama Ayah',
            'pekerjaan_ayah' => 'Pekerjaan Ayah',
            'penghasilan_ayah' => 'Penghasilan Ayah',
            'nama_ibu' => 'Nama Ibu',
            'pekerjaan_ibu' => 'Pekerjaan Ibu',
            'penghasilan_ibu' => 'Penghasilan Ibu',
            'nama_wali' => 'Nama Wali',
            'pekerjaan_wali' => 'Pekerjaan Wali',
            'penghasilan_wali' => 'Penghasilan Wali',
            'jml_saudara' => 'Jml Saudara',
            'bank_id' => 'Bank ID',
            'no_rek' => 'No Rek',
            'fakultas_id'=>'Fakultas',
        ];
    }

    //public $id;
    //public $username;
    //public $password;
    public $authKey; 
    public $confirm_password;
    //public $accessToken;

   /*public function beforeSave(){
        $this->tanggal_lahir = date('Y-m-d', strtotime($this->tanggal_lahir));
        return true;
   }

   public function afterFind(){
        $this->tanggal_lahir = date('d-m-Y', strtotime($this->tanggal_lahir));
        return true;
   }*/

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        $user = User::find()->where(['id'=>$id])->one();
        return isset($user)? $user : null;  
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $user = User::find()->where(['accessToken'=>$token])->one();

            if ($user) {
                return $user;
            }
        

        return null;
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByEmail($username)
    {
        $user = User::find()->where(['email'=>$username])->one();
        if ($user) {
                return $user;
            
        }

        return null;
    }

    public static function findByAdmin($username)
    {
        $user = User::findOne(['email'=>$username,'level'=>'admin']);
        if ($user) {
                return $user;
            
        }

        return null;
    }


    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
    
        return $this->password === md5($password);
    }

    public function getBank()
    {
        return $this->hasOne(Bank::className(), ['id' => 'bank_id']);
    }
}
