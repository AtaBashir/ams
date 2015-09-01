<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teacher".
 *
 * @property integer $tchr_id
 * @property string $tchr_fname
 * @property string $tchr_lname
 * @property string $tchr_address
 * @property string $tchr_postcode
 * @property string $tchr_mobile
 * @property string $tchr_phone
 * @property string $tchr_email
 * @property integer $tchr_active
 * @property string $tchr_disp_id
 *
 * @property Clss[] $clsses
 * @property TeacherMatrix[] $teacherMatrices
 * @property Course[] $tmCrs
 */
class Teacher extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tchr_disp_id', 'tchr_fname', 'tchr_email'], 'required'],
            [['tchr_id'], 'integer'],
            [['tchr_fname', 'tchr_lname', 'tchr_address'], 'string', 'max' => 50],
            [['tchr_postcode'], 'string', 'max' => 10],
            [['tchr_mobile', 'tchr_phone'], 'string', 'max' => 12],
            [['tchr_email'], 'email'],
            [['tchr_disp_id'], 'string', 'max' => 16],
        	[['tchr_active'],'boolean'],
            [['tchr_disp_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tchr_id' => 'Tchr ID',
        	'tchr_disp_id' => 'Teacher ID',
            'tchr_fname' => 'First Name',
            'tchr_lname' => 'Last Name',
            'tchr_address' => 'Address',
            'tchr_postcode' => 'Postcode',
            'tchr_mobile' => ' Mobile',
            'tchr_phone' => 'Phone',
            'tchr_email' => 'Email',
            'tchr_active' => 'Active',
            
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClsses()
    {
        return $this->hasMany(Clss::className(), ['clss_tchr_id' => 'tchr_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacherMatrices()
    {
        return $this->hasMany(TeacherMatrix::className(), ['tm_tchr_id' => 'tchr_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmCrs()
    {
        return $this->hasMany(Course::className(), ['crs_id' => 'tm_crs_id'])->viaTable('teacher_matrix', ['tm_tchr_id' => 'tchr_id']);
    }
    
    public function beforeSave($insert)
    {
    	if ($this->isNewRecord) {
    		// get new id
    		$connection = \Yii::$app->db;
    		$tchr = $connection->createCommand('SELECT max(tchr_id) max_tchr_id FROM teacher');
    		$id_max = $tchr->queryScalar();
    		
    		$this->tchr_id = $id_max+1;
    	}
    	return parent::beforeSave($insert);
    }
}
