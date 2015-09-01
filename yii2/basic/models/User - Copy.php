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
    
   // private static $users = array();
    
    
    private static $users = [
        '100' => [
            'id' => null,
            'username' => null,
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ]];
//         '101' => [
//             'id' => '101',
//             'username' => 'demo',
//             'password' => 'demo',
//             'authKey' => 'test101key',
//             'accessToken' => '101-token',
//         ],
//     ];

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
    	
       return isset(self::$users->$id) ? new static(self::$users->$id) : null;
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
    			"usr_id" => $username
    	])
    	->one();
    	if (!count($dbUser)) {
    		return null;
    	}
    	return new static($dbUser);
    	
    	
//     	$uid=$username;
//     	$connection = \Yii::$app->db;
//     	$user = $connection->createCommand('SELECT usr_id as username,usr_pass as password FROM user WHERE usr_id=:userid');
    	 
//     	$user->bindValue(':userid', 'ata');
    	 
//     	$reader = $user->queryOne();
//     	$userid='';
//     	$row=array();
//     	//   	while ($rows = $reader->read()) {
//     	$row = $reader;    	
//    // 	self::$users=$row;
//         foreach (self::$users as $user) {
//           //  if (strcasecmp($user['username'], $username) === 0) {
//                 return new static($user);
//           //  }
//         }

//         return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

//     /**
//      * @inheritdoc
//      */
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
    	if(Yii::$app->getSecurity()->validatePassword($password, $this->usr_pass))
    	{
    		$this->id=100;
    		$this->authKey = 'test100key';
    		$this->accessToken = '100-token';
    		self::$users = [
    				'100' => [
    						'id' =>100,
    						'username' => $this->usr_id,
    						'authKey' => 'test100key',
    						'accessToken' => '100-token',
    				]];
    	//	self::$users->id=1;
    	//	self::$users->username=$DbUsers->usr_id;
    	}
    	else 
    	{
    		$this->id=null;
    		self::$users = [
    				'100' => [
    						'id' =>null,
    						'username' =>null,
    						'authKey' => 'test100key',
    						'accessToken' => '100-token',
    				]];
    	}
    	
    	return (Yii::$app->getSecurity()->validatePassword($password, $this->usr_pass));
     //   return $this->usr_pass === $password;
    }
}
