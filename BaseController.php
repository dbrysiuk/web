<?php

use Yii;
use yii\web\Controller;
use yii\web\Cookie;

class BaseController extends Controller {

    public function beforeAction ($action){
        if (!parent::beforeAction($action)){
            return false;
        }
        Yii::$app->language=Yii::$app->request->post('language');
        $cookie = new Cookie ([
             'name'=>'lang',
             'value'=>Yii::$app->request->post('language'),
        ]);
        Yii::$app->getResponse()->getCookies()->add($cookie);
        $language=Yii::$app->getRequest()->getCookies()->getValue('lang');
        Yii::$app->language=$language;


        return true;
    }

}
