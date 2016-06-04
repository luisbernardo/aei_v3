<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "credencial".
 *
 * @property integer $idcredencial
 * @property string $PASSWORD_ADMINISTRACAO
 * @property integer $ESTADO
 * @property string $USERNAME_ADMINISTRACAO
 * @property string $AUTH_KEY
 */
class Credencial extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CREDENCIAL';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PASSWORD_ADMINISTRACAO', 'ESTADO', 'USERNAME_ADMINISTRACAO'], 'required'],
            [['ESTADO'], 'integer'],
            [['PASSWORD_ADMINISTRACAO'], 'string', 'max' => 255],
            [['USERNAME_ADMINISTRACAO'], 'string', 'max' => 45],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['IDCREDENCIAL' => $id, 'ESTADO' => self::STATUS_ACTIVE]);
    }
    
    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
    
    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['USERNAME_ADMINISTRACAO' => $username, 'ESTADO' => self::STATUS_ACTIVE]);
    }
    
    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'PASSWORD_RESET_TOKEN' => $token,
            'ESTADO' => self::STATUS_ACTIVE,
        ]);
    }
    
    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }
    
    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->AUTH_KEY;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
    
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->PASSWORD_ADMINISTRACAO);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->PASSWORD_ADMINISTRACAO = Yii::$app->security->generatePasswordHash($password);
    }
    
    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->AUTH_KEY = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDCREDENCIAL' => 'Credencial',
            'PASSWORD_ADMINISTRACAO' => 'Password',
            'ESTADO' => 'Estado',
            'USERNAME_ADMINISTRACAO ' => 'Username',
        ];
    }
    
    public function signup() {
        $user = new Credencial();
        $user->USERNAME_ADMINISTRACAO = $this->USERNAME_ADMINISTRACAO;
        $user->ESTADO = $this->ESTADO;
        $user->setPassword($this->PASSWORD_ADMINISTRACAO);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
