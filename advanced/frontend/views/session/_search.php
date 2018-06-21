<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\SessionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="session-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'token') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'admin_id') ?>

    <?= $form->field($model, 'equations') ?>

    <?= $form->field($model, 'inequalities') ?>

    <?php // echo $form->field($model, 'functions') ?>

    <?php // echo $form->field($model, 'linearEquations') ?>

    <?php // echo $form->field($model, 'polynomial') ?>

    <?php // echo $form->field($model, 'quadraticEquations') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
