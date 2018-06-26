<?php

use yii\bootstrap\Html;
use Yii;

echo Html::beginForm();
echo Html::dropdownList('language', Yii::$app->language, ['en'=>'English', 'de'=>'Deutsch', 'ru'=>'Русский']);
echo Html::submitButton('Change');
echo Html::endForm();