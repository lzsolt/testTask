<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BJobAdvertisement */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Bjob Advertisement',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bjob Advertisements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="bjob-advertisement-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
		'orientationList' => $orientationList,
        'model' => $model,
    ]) ?>

</div>
