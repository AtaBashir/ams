<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * * @property integer $id
 * @property string $usr_id
 * @property string $usr_name
 * @property string $usr_pass
 * @property string $usr_email
 * @property integer $usr_is_teacher
 * @property integer $usr_is_admin
 * @property integer $usr_is_su
 * @property integer $usr_type_id
 * @property integer $usr_active
 */
class UserAdmin extends \yii\db\ActiveRecord
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
            [['usr_id', 'usr_name', 'usr_pass', 'usr_email'], 'required'],
            [['usr_is_teacher', 'usr_is_admin', 'usr_is_su', 'usr_active'], 'boolean'],
        	[['id','usr_type_id'], 'integer'],        		
            [['usr_id'], 'string', 'max' => 16],
            [['usr_name'], 'string', 'max' => 50],
            [['usr_pass'], 'string', 'max' => 125],
            ['usr_email','email'],
            [['usr_id','id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
       return [
       		'id' => 'id',
            'usr_id' => 'User ID',
            'usr_name' => 'Name',
            'usr_pass' => 'Password',
            'usr_email' => 'Email',
            'usr_is_teacher' => 'Is Teacher',
            'usr_is_admin' => 'Is Admin',
            'usr_is_su' => 'Is SU',
            'usr_type_id' => 'Type ID',
            'usr_active' => 'Is Active',
        ];
    }
    
    public function hashPassword( $password )
    {
    	return Yii::$app->getSecurity()->generatePasswordHash($password);
    	//    	return Security::generatePasswordHash( $password );
    }
    
    public function beforeSave($insert)
    {
    	// hash password on before saving the record:
    	if ($this->isNewRecord) 
	    	$this->usr_pass = $this->hashPassword($this->usr_pass );
    	
    	$this->usr_is_teacher = 0;
    	$this->usr_is_admin = 1;
    
    	return parent::beforeSave($insert);
    }
}
