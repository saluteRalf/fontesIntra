<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EquipeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipe-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'descricao') ?>

    <?= $form->field($model, 'motorista_id') ?>

    <?= $form->field($model, 'tecnico_enfermeiro_id') ?>

    <?php // echo $form->field($model, 'enfermeiro_id') ?>

    <?php // echo $form->field($model, 'medico_id') ?>

    <?php // echo $form->field($model, 'classificacao_id') ?>

    <?php // echo $form->field($model, 'em_atendimento') ?>

    <?php // echo $form->field($model, 'localizacao_atual') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
