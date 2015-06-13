<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\POrientation */

$this->title = Yii::t('app', 'Create Porientation');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Porientations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="porientation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
