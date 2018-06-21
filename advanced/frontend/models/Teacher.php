<?php

namespace frontend\models;

use Yii;
use yii\base\NotSupportedException;
use yii\bahaviors\TimestampBehavior;
use yii\db\ActiceRecord;
use yii\web\IdentityInterface;


/**
 * This is the model class for table "teacher".
 *
 * @property int $id
 * @property string $full_name
 * @property string $username
 * @property string $email
 * @property string $password
 *
 * @property Session[] $sessions
 */
class Teacher extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'username', 'email', 'password'], 'required'],
            [['full_name'], 'string', 'max' => 40],
            [['username'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 254],
            [['password'], 'string', 'max' => 60],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'full_name' => Yii::t('app', 'Full Name'),
            'username' => Yii::t('app', 'Username'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSessions()
    {
        return $this->hasMany(Session::className(), ['admin_id' => 'id']);
    }

    public function getAuthKey(){
	throw new \yii\base\NotsupportedException();
    }

    public function getId (){
	return $this->id;
    }

    public function validateAuthKey ($authKey){
	throw new \yii\base\NotsupportedException();
    }

    public static function findIdentity ($id){
	return self::findOne($id);
    }

    public static function findIdentityByAccessToken ($token, $type=null){
	throw new \yii\base\NotsupportedException();
    }

    public static function findByUsername ($username){
	return self::findOne(['username'=>$username]);
    }

    public function validatePassword ($password){
   	return $this->password === $password;
    }
}
