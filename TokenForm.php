<?php
namespace student\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $token;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['token', 'required'],
            ['token', 'string', 'max' => 10],
        ];
    }


    public function token()
    {
        $session = Token::findByToken($this->token);
    }
}
