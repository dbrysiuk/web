<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Session */

$this->title = Yii::t('app', 'Update Session: ' . $model->name, [
    'nameAttribute' => '' . $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sessions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->token]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="session-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
