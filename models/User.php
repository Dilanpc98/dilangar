<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $iduser
 * @property string|null $username
 * @property string|null $nombre
 * @property string|null $apellido
 * @property string|null $password_hash
 * @property string|null $auth_key
 * @property string|null $access_token
 * @property string|null $role
 */
class User extends ActiveRecord implements IdentityInterface
{
    
    public $password;
      
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    public function rules()
    {
        return [
            [['username','nombre', 'apellido', 'password', 'auth_key', 'access_token', 'role'], 'required'],
            [['username', 'password_hash'], 'string', 'max' => 255],
            [['nombre', 'apellido'], 'string', 'max' => 150],
            [['auth_key', 'access_token', 'role'], 'string', 'max' => 45],
            [['username'], 'unique'],
        ];
    }
    public static function findIdentity($iduser)
    {
        return static::findOne($iduser);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public function getId()
    {
        return $this->iduser;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function generateAccessToken()
    {
        $this->access_token = Yii::$app->security->generateRandomString();
    }

    public function beforeValidate(){
        if ($this->isNewRecord) {
            $this->generateAuthKey();
            $this->generateAccessToken();
        }
        return parent::beforeValidate();
    }

    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)){
            if(isset($this->password)){
                $this->setPassword($this->password);
            }
            return true;
        }
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iduser' => Yii::t('app', 'Iduser'),
            'username' => Yii::t('app', 'Username'),
            'nombre' => Yii::t('app', 'Nombre'),
            'apellido' => Yii::t('app', 'Apellido'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'access_token' => Yii::t('app', 'Access Token'),
            'role' => Yii::t('app', 'Role'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }
}
