<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "campus".
 *
 * @property integer $cmps_id
 * @property string $cmps_desc
 * @property string $cmps_address
 *
 * @property CalendarHolidays[] $calendarHolidays
 * @property Clss[] $clsses
 * @property CourseCampus[] $courseCampuses
 * @property Course[] $ccCrs
 */
class Campus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'campus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cmps_desc'], 'required'],
            [['cmps_id'], 'integer'],
            [['cmps_desc', 'cmps_address'], 'string', 'max' => 50],
            [['cmps_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cmps_id' => 'Campus ID',
            'cmps_desc' => 'Description',
            'cmps_address' => 'Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalendarHolidays()
    {
        return $this->hasMany(CalendarHolidays::className(), ['ch_cmps_id' => 'cmps_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClsses()
    {
        return $this->hasMany(Clss::className(), ['clss_cmps_id' => 'cmps_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseCampuses()
    {
        return $this->hasMany(CourseCampus::className(), ['cc_cmps_id' => 'cmps_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCcCrs()
    {
        return $this->hasMany(Course::className(), ['crs_id' => 'cc_crs_id'])->viaTable('course_campus', ['cc_cmps_id' => 'cmps_id']);
    }
    
    public function beforeSave($insert)
    {
    	if ($this->isNewRecord) {
    		// get new id
    		$connection = \Yii::$app->db;
    		$cmps = $connection->createCommand('SELECT max(cmps_id) max_cmps_id FROM campus');
    		$id_max = $cmps->queryScalar();
    		
    		$this->cmps_id = $id_max+1;
    	}
    	return parent::beforeSave($insert);
    }
}
