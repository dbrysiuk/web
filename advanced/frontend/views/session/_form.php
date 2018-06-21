<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Session */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="session-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admin_id')->textInput() ?>

    <?= $form->field($model, 'equations')->textInput() ?>

    <?= $form->field($model, 'inequalities')->textInput() ?>

    <?= $form->field($model, 'functions')->textInput() ?>

    <?= $form->field($model, 'linearEquations')->textInput() ?>

    <?= $form->field($model, 'polynomial')->textInput() ?>

    <?= $form->field($model, 'quadraticEquations')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
