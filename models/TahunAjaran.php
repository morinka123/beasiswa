<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tahun_ajaran".
 *
 * @property integer $id
 * @property string $ta
 * @property string $semester
 * @property string $active
 */
class TahunAjaran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tahun_ajaran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['semester', 'active'], 'string'],
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
            'ta' => 'Ta',
            'semester' => 'Semester',
            'active' => 'Active',
        ];
    }
}
