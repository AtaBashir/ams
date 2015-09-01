<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clss".
 *
 * @property integer $clss_id
 * @property string $clss_disp_id
 * @property integer $clss_cmps_id
 * @property integer $clss_ct_id
 * @property integer $clss_cal_id
 * @property string $clss_cw_from
 * @property string $clss_cw_to
 * @property integer $clss_subj_id
 * @property integer $clss_tchr_id
 * @property integer $clss_day_mon
 * @property integer $clss_day_tue
 * @property integer $clss_day_wed
 * @property integer $clss_day_thu
 * @property integer $clss_day_fri
 * @property integer $clss_day_sat
 * @property integer $clss_day_sun
 * @property string $clss_timef
 * @property string $clss_timet
 * @property integer $clss_rm_id
 *
 * @property Attendance[] $attendances
 * @property Calendar $clssCal
 * @property Campus $clssCmps
 * @property CourseType $clssCt
 * @property Room $clssRm
 * @property Subject $clssSubj
 * @property Teacher $clssTchr
 */
class Clss extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clss';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clss_id', 'clss_disp_id', 'clss_cmps_id', 'clss_ct_id', 'clss_cal_id', 'clss_cw_from', 'clss_cw_to', 'clss_subj_id', 'clss_timef', 'clss_timet'], 'required'],
            [['clss_id', 'clss_cmps_id', 'clss_ct_id', 'clss_cal_id', 'clss_subj_id', 'clss_tchr_id', 'clss_day_mon', 'clss_day_tue', 'clss_day_wed', 'clss_day_thu', 'clss_day_fri', 'clss_day_sat', 'clss_day_sun', 'clss_rm_id'], 'integer'],
            [['clss_cw_from', 'clss_cw_to', 'clss_timef', 'clss_timet'], 'safe'],
            [['clss_disp_id'], 'string', 'max' => 16],
            [['clss_disp_id'], 'unique'],
            [['clss_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'clss_id' => 'Clss ID',
            'clss_disp_id' => 'Clss Disp ID',
            'clss_cmps_id' => 'Clss Cmps ID',
            'clss_ct_id' => 'Clss Ct ID',
            'clss_cal_id' => 'Clss Cal ID',
            'clss_cw_from' => 'Clss Cw From',
            'clss_cw_to' => 'Clss Cw To',
            'clss_subj_id' => 'Clss Subj ID',
            'clss_tchr_id' => 'Clss Tchr ID',
            'clss_day_mon' => 'Clss Day Mon',
            'clss_day_tue' => 'Clss Day Tue',
            'clss_day_wed' => 'Clss Day Wed',
            'clss_day_thu' => 'Clss Day Thu',
            'clss_day_fri' => 'Clss Day Fri',
            'clss_day_sat' => 'Clss Day Sat',
            'clss_day_sun' => 'Clss Day Sun',
            'clss_timef' => 'Clss Timef',
            'clss_timet' => 'Clss Timet',
            'clss_rm_id' => 'Clss Rm ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttendances()
    {
        return $this->hasMany(Attendance::className(), ['att_clss_id' => 'clss_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClssCal()
    {
        return $this->hasOne(Calendar::className(), ['cal_id' => 'clss_cal_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClssCmps()
    {
        return $this->hasOne(Campus::className(), ['cmps_id' => 'clss_cmps_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClssCt()
    {
        return $this->hasOne(CourseType::className(), ['ct_id' => 'clss_ct_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClssRm()
    {
        return $this->hasOne(Room::className(), ['rm_id' => 'clss_rm_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClssSubj()
    {
        return $this->hasOne(Subject::className(), ['subj_id' => 'clss_subj_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClssTchr()
    {
        return $this->hasOne(Teacher::className(), ['tchr_id' => 'clss_tchr_id']);
    }
}
