<?php

namespace app\models;

use Yii;
use app\models\Users as DbUser;

class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
    public $id;
//     public $username;
//     public $password;
    public $authKey;
    public $accessToken;
    public $usr_id;
    public $usr_name;
    public $usr_pass;
    public $usr_email;
    public $usr_secq;
    public $usr_seca;
    public $usr_is_teacher;
    public $usr_is_admin;
    public $usr_is_su;
    public $usr_type_id;
    public $usr_active;

    private static $users = array();
//      [
//         '100' => [
//             'id' => '100',
//             'usr_id' => 'Admin',
//             'usr_pass' => 'Admin',
//             'authKey' => 'test100key',
//             'accessToken' => '100-token',
//         ],
//         '101' => [
//             'id' => '101',
//             'usr_id' => 'demo',
//             'usr_pass' => 'demo',
//             'authKey' => 'test101key',
//             'accessToken' => '101-token',
//         ],
//     ];

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
    	
    	$dbUser = DbUser::find()
    	->where([
    			"id" => $id
    	])
    	->one();
    	if (!count($dbUser)) {
    		return null;
    	}
    	 
    	return new static($dbUser);

    	
//     	self::$users[100]=['id'=>100,'usr_id' => $dbUser->usr_id, 'usr_name' => $dbUser->usr_name];
    	 
    	 
   	
//     	foreach (self::$users as $user) {
//     		if (strcasecmp($user['usr_id'],$username ) === 0) {
//     			return new static($user);
//     		}
//     	}
//     	return null;

    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
       $dbUser = DbUser::find()
    	->where([
    			"usr_id" => $username,
    			"usr_active" => 1
    	])
    	->one();
    	if (!count($dbUser)) {
    		return null;
    	}
    	
   // 	self::$users[100]=['id'=>100,'usr_id' => $dbUser->usr_id, 'usr_name' => $dbUser->usr_name];
    	
    	
//     	self::$users= [
//          '100' => [
//              'id' => '100',
//              'usr_id' => 'Admin',
//              'usr_pass' => 'Admin',
//              'authKey' => 'test100key',
//              'accessToken' => '100-token',
//          ]];
   // 	die(var_dump(self::$users));
//     	foreach (self::$users as $user) {
//     		if (strcasecmp($user['usr_id'], $username) === 0) {
//     			return new static($user);
//     		}
//     	}
//     	return null;
    	return new static($dbUser);
    	
    	
//     	         foreach (self::$users as $user) {
//     		             if (strcasecmp($user['usr_id'], $username) === 0) {
//     		                 return new static($user);
//     		             }
//     	         }
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
    //	if(Yii::$app->getSecurity()->validatePassword($password, $this->usr_pass))
    //	{
    //		$this->id=100;
    		$this->authKey = 'test100key';
    		$this->accessToken = '100-token';
    //	}
    	//die($this->usr_pass);
   //     return true;
    //	return $this->usr_pass === $password;
        
        return (Yii::$app->getSecurity()->validatePassword($password, $this->usr_pass));
    }
}
