<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "session".
 *
 * @property string $token
 * @property string $name
 * @property int $admin_id
 * @property int $equations
 * @property int $inequalities
 * @property int $functions
 * @property int $linearEquations
 * @property int $polynomial
 * @property int $quadraticEquations
 *
 * @property Administrator $admin
 * @property Users[] $users
 */
class Session extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'session';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['token', 'name'], 'required'],
            [['admin_id', 'equations', 'inequalities', 'functions', 'linearEquations', 'polynomial', 'quadraticEquations'], 'integer'],
            [['token'], 'string', 'max' => 10],
            [['name'], 'string', 'max' => 30],
            [['token'], 'unique'],
            [['admin_id'], 'exist', 'skipOnError' => true, 'targetClass' => Administrator::className(), 'targetAttribute' => ['admin_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'token' => Yii::t('app', 'Token'),
            'name' => Yii::t('app', 'Name'),
            'admin_id' => Yii::t('app', 'Admin ID'),
            'equations' => Yii::t('app', 'Equations'),
            'inequalities' => Yii::t('app', 'Inequalities'),
            'functions' => Yii::t('app', 'Functions'),
            'linearEquations' => Yii::t('app', 'Linear Equations'),
            'polynomial' => Yii::t('app', 'Polynomial'),
            'quadraticEquations' => Yii::t('app', 'Quadratic Equations'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmin()
    {
        return $this->hasOne(Administrator::className(), ['id' => 'admin_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['session_id' => 'token']);
    }
}
