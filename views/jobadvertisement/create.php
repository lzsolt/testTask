<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BJobAdvertisement */

$this->title = Yii::t('app', 'Create Bjob Advertisement');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bjob Advertisements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bjob-advertisement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
		'orientationList' => $orientationList,
        'model' => $model,
    ]) ?>

</div>
