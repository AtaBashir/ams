<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $usr_id
 * @property string $usr_name
 * @property string $usr_pass
 * @property string $usr_email
 * @property string $usr_secq
 * @property string $usr_seca
 * @property integer $usr_is_teacher
 * @property integer $usr_is_admin
 * @property integer $usr_is_su
 * @property integer $usr_type_id
 * @property integer $usr_active
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','usr_id', 'usr_name', 'usr_pass', 'usr_email'], 'required'],
            [['usr_is_teacher', 'usr_is_admin', 'usr_is_su', 'usr_type_id', 'usr_active'], 'integer'],
            [['usr_id'], 'string', 'max' => 16],
            [['usr_name'], 'string', 'max' => 50],
            [['usr_pass'], 'string', 'max' => 125],
            [['usr_email'], 'string', 'max' => 30],
        	[['id'], 'unique'],
            [['usr_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        	'id' => 'Id',
            'usr_id' => 'Usr ID',
            'usr_name' => 'Usr Name',
            'usr_pass' => 'Usr Pass',
            'usr_email' => 'Usr Email',
            'usr_is_teacher' => 'Usr Is Teacher',
            'usr_is_admin' => 'Usr Is Admin',
            'usr_is_su' => 'Usr Is Su',
            'usr_type_id' => 'Usr Type ID',
            'usr_active' => 'Usr Active',
        ];
    }
}
