<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Cookie;

class BaseController extends Controller {

    public function beforeAction ($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }

        if (Yii::$app->request->post('language')) {

            $language = Yii::$app->getRequest()->getCookies()->getValue('lang');
            $langRequest = Yii::$app->request->post('language');

            if ($language === $langRequest) {
                Yii::$app->language = $language;
                return true;
            } else {
                $cookie = new Cookie ([
                    'name' => 'lang',
                    'value' => $langRequest,
                ]);
                Yii::$app->getResponse()->getCookies()->add($cookie);
                Yii::$app->language = $langRequest;
                return true;
            }
        }
        if (Yii::$app->getRequest()->getCookies()->getValue('lang')) {
            $language = Yii::$app->getRequest()->getCookies()->getValue('lang');
            Yii::$app->language = $language;
        }
        return true;
    }
}
