<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\Query;


/**
 * This is the model class for table "student".
 *
 * @property integer $st_id
 * @property string $st_fname
 * @property string $st_lname
 * @property string $st_address
 * @property string $st_postcode
 * @property string $st_mobile
 * @property string $st_phone
 * @property string $st_email
 * @property string $st_usrname
 * @property string $st_pass
 * @property string $st_secq
 * @property string $st_seca
 * @property integer $st_active
 * @property string $st_disp_id
 *
 * @property AttendanceDet[] $attendanceDets
 * @property Enrolment[] $enrolments
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['st_disp_id', 'st_fname', 'st_email'], 'required'],
            [['st_id'], 'integer'],
        	[['st_active'],'boolean'],
            [['st_fname', 'st_lname', 'st_address'], 'string', 'max' => 50],
            [['st_postcode'], 'string', 'max' => 10],
            [['st_mobile', 'st_phone'], 'string', 'max' => 12],
            [['st_email'],'email'],
            [['st_disp_id'], 'string', 'max' => 16],
            [['st_disp_id'], 'unique'],
            [['st_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'st_id' => 'Student ID',
        	'st_disp_id' => 'Student ID',
            'st_fname' => 'First Name',
            'st_lname' => 'Last Name',
            'st_address' => 'Address',
            'st_postcode' => 'Postcode',
            'st_mobile' => 'Mobile',
            'st_phone' => 'Phone',
            'st_email' => 'Email',
            'st_active' => 'Active',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttendanceDets()
    {
        return $this->hasMany(AttendanceDet::className(), ['attd_st_id' => 'st_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnrolments()
    {
        return $this->hasMany(Enrolment::className(), ['enr_st_id' => 'st_id']);
    }
    
    public function beforeSave($insert)
    {
    	if ($this->isNewRecord) {
	    	// get new id
	    	$connection = \Yii::$app->db;
	    	$stdnt = $connection->createCommand('SELECT max(st_id) max_st_id FROM student');    	
	    	$id_max = $stdnt->queryScalar();
	    	//$stdnt = Student::findBySql('SELECT max(st_id) max_st_id FROM student')->all();
    	   	$this->st_id = $id_max+1;
    	}
    	return parent::beforeSave($insert);
    }
    
}
