<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PreExistentes */

$this->title = 'Editar Preexistente: ' . $model->id_pre_existente;
$this->params['breadcrumbs'][] = ['label' => 'Preexistentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pre_existente, 'url' => ['view', 'id' => $model->id_pre_existente]];
$this->params['breadcrumbs'][] = 'Editar';
?>
<div class="pre-existentes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
