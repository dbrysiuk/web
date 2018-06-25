<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \student\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Token';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-token">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Yii::$app->t('app', 'Please enter the Token:')</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-token']); ?>

                <?= $form->field($model, 'token')->textInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Enter', ['class' => 'btn btn-primary', 'name' => 'token-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
