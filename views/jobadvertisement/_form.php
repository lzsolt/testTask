<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BJobAdvertisement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bjob-advertisement-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'orientation_id')->dropDownList($orientationList, ['prompt' => Yii::t('app', 'Choose orientation...')]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

	<?php if (Yii::$app->controller->action->id == 'update') { ?>
		<?= $form->field($model, 'status')->dropDownList([ 'new' => 'New', 'ready' => 'Ready', 'active' => 'Active']) ?>

		<?= $form->field($model, 'created_at')->textInput(['readonly' => 'readonly', 'disabled' => 'disabled']) ?>

		<?= $form->field($model, 'activated_at')->textInput(['readonly' => 'readonly', 'disabled' => 'disabled']) ?>
	<?php } ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

	<?php
		if (Yii::$app->controller->action->id == 'update' && $model->status != 'active') {
			$form = ActiveForm::begin(['method' => 'post', 'action' => Yii::$app->getUrlManager()->createUrl('/jobadvertisement/setstatus')]);
	?>

	<?= Html::activeHiddenInput($model, 'id') ?>

	<?= Html::submitButton(Yii::t('app', 'Set active'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

	<?php
			ActiveForm::end();
		}
	?>
</div>
