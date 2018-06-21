<?php
/**
 * Created by PhpStorm.
 * User: Airwalk
 * Date: 19.06.2018
 * Time: 16:41
 */

namespace frontend\models;

use Yii;
use yii\base\NotSupportedException;
use yii\bahaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $level
 * @property int $knowledgePoints
 * @property int $collaborationPount
 * @property int $equations
 * @property int $inequalities
 * @property int $functions
 * @property int $linearEquations
 * @property int $polynomial
 * @property int $quadraticEquations
 * @property string $session_id
 *
 * @property Session $session
 */
class Student extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'level'], 'required'],
            [['knowledgePoints', 'collaborationPount', 'equations', 'inequalities', 'functions', 'linearEquations', 'polynomial', 'quadraticEquations'], 'integer'],
            [['username'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 60],
            [['level', 'session_id'], 'string', 'max' => 10],
            [['username'], 'unique'],
            [['password'], 'unique'],
            [['session_id'], 'exist', 'skipOnError' => true, 'targetClass' => Session::className(), 'targetAttribute' => ['session_id' => 'token']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'level' => Yii::t('app', 'Level'),
            'knowledgePoints' => Yii::t('app', 'Knowledge Points'),
            'collaborationPount' => Yii::t('app', 'Collaboration Pount'),
            'equations' => Yii::t('app', 'Equations'),
            'inequalities' => Yii::t('app', 'Inequalities'),
            'functions' => Yii::t('app', 'Functions'),
            'linearEquations' => Yii::t('app', 'Linear Equations'),
            'polynomial' => Yii::t('app', 'Polynomial'),
            'quadraticEquations' => Yii::t('app', 'Quadratic Equations'),
            'session_id' => Yii::t('app', 'Session ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSession()
    {
        return $this->hasOne(Session::className(), ['token' => 'session_id']);
    }

    public function getAuthKey (){
        throw new \yii\base\NotsupportedException();
    }

    public function getId () {
        return $this->id;
    }

    public function validateAuthKey ($authKey){
        throw new \yii\base\NotsupportedException();
    }

    public static function findIdentity ($id){
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken ($token, $type = null){
        throw new \yii\base\NotsupportedException();
    }

    public static function findByUsername ($username){
        return self::findOne(['username'=>$username]);
    }

    public function validatePassword ($password){
        return $this->password === $password;
    }

}
