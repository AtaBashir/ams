<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "course_type".
 *
 * @property integer $ct_id
 * @property string $ct_desc
 *
 * @property Clss[] $clsses
 * @property Course[] $courses
 */
class CourseType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ct_id', 'ct_desc'], 'required'],
            [['ct_id'], 'integer'],
            [['ct_desc'], 'string', 'max' => 50],
            [['ct_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ct_id' => 'ID',
            'ct_desc' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClsses()
    {
        return $this->hasMany(Clss::className(), ['clss_ct_id' => 'ct_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['crs_ct_id' => 'ct_id']);
    }
}
