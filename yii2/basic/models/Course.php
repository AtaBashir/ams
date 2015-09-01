<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property integer $crs_id
 * @property string $crs_desc
 * @property integer $crs_ct_id
 * @property integer $crs_duration
 * @property string $crs_drtn_type
 * @property integer $crs_days
 * @property double $crs_wkly_hrs
 * @property integer $crs_active
 * @property string $crs_disp_id
 *
 * @property CalendarHolidays[] $calendarHolidays
 * @property CourseType $crsCt
 * @property CourseCampus[] $courseCampuses
 * @property Campus[] $ccCmps
 * @property CourseSubj[] $courseSubjs
 * @property Subject[] $csSubjs
 * @property TeacherMatrix[] $teacherMatrices
 * @property Teacher[] $tmTchrs
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['crs_desc', 'crs_ct_id', 'crs_disp_id','crs_duration'], 'required'],
            [['crs_id', 'crs_ct_id', 'crs_duration', 'crs_days'], 'integer'],
            [['crs_wkly_hrs'], 'number'],
            [['crs_desc'], 'string', 'max' => 50],
            [['crs_drtn_type'], 'string', 'max' => 1],
            [['crs_disp_id'], 'string', 'max' => 16],
        	[['crs_active'],'boolean'],
            [['crs_disp_id'], 'unique'],
            [['crs_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'crs_id' => 'Course ID',
            'crs_desc' => 'Description',
            'crs_ct_id' => 'Course Type',
            'crs_duration' => 'Course Duration',
            'crs_drtn_type' => 'Duration Type',
            'crs_days' => 'Days',
            'crs_wkly_hrs' => 'Weekly Hrs',
            'crs_active' => 'Active',
            'crs_disp_id' => 'Course ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalendarHolidays()
    {
        return $this->hasMany(CalendarHolidays::className(), ['ch_crs_id' => 'crs_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrsCt()
    {
        return $this->hasOne(CourseType::className(), ['ct_id' => 'crs_ct_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseCampuses()
    {
        return $this->hasMany(CourseCampus::className(), ['cc_crs_id' => 'crs_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCcCmps()
    {
        return $this->hasMany(Campus::className(), ['cmps_id' => 'cc_cmps_id'])->viaTable('course_campus', ['cc_crs_id' => 'crs_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseSubjs()
    {
        return $this->hasMany(CourseSubj::className(), ['cs_crs_id' => 'crs_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCsSubjs()
    {
        return $this->hasMany(Subject::className(), ['subj_id' => 'cs_subj_id'])->viaTable('course_subj', ['cs_crs_id' => 'crs_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacherMatrices()
    {
        return $this->hasMany(TeacherMatrix::className(), ['tm_crs_id' => 'crs_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmTchrs()
    {
        return $this->hasMany(Teacher::className(), ['tchr_id' => 'tm_tchr_id'])->viaTable('teacher_matrix', ['tm_crs_id' => 'crs_id']);
    }
    
    public function beforeSave($insert)
    {
    	if ($this->isNewRecord) {
    		// get new id
    		$connection = \Yii::$app->db;
    		$crs = $connection->createCommand('SELECT max(crs_id) max_cmps_id FROM course');
    		$id_max = $crs->queryScalar();
    
    		$this->crs_id = $id_max+1;
    	}
    	
    	if ($this->crs_drtn_type=='2')
    	{
    		$this->crs_days=$this->crs_duration * 7;
    	}
    	else 
    	{
    		$this->crs_days=$this->crs_duration;
    	}
    	
    	return parent::beforeSave($insert);
    }
}
