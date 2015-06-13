<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BJobAdvertisementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Job Advertisements');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bjob-advertisement-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create job advertisement'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'name',
            'created_at',
            'activated_at',
			[
				'label'=> \Yii::t('app', 'Orientation'),
				'format' => 'raw',
				'value'=>function ($data) {
					return $data->getOrientation()->one()->name;
				},
			],
			'email:email',
            'status',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}'],
        ],
    ]); ?>

</div>
