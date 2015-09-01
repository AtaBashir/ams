<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teacher_matrix".
 *
 * @property integer $tm_tchr_id
 * @property integer $tm_crs_id
 * @property integer $tm_tchr_active
 *
 * @property Course $tmCrs
 * @property Teacher $tmTchr
 * @property TeacherMatrixd[] $teacherMatrixds
 */
class TeacherMatrix extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teacher_matrix';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tm_tchr_id', 'tm_crs_id'], 'required'],
            [['tm_tchr_id', 'tm_crs_id', 'tm_tchr_active'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tm_tchr_id' => 'Tm Tchr ID',
            'tm_crs_id' => 'Tm Crs ID',
            'tm_tchr_active' => 'Tm Tchr Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmCrs()
    {
        return $this->hasOne(Course::className(), ['crs_id' => 'tm_crs_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmTchr()
    {
        return $this->hasOne(Teacher::className(), ['tchr_id' => 'tm_tchr_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacherMatrixds()
    {
        return $this->hasMany(TeacherMatrixd::className(), ['tmd_tchr_id' => 'tm_tchr_id', 'tmd_crs_id' => 'tm_crs_id']);
    }
}
