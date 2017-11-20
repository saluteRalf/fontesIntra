<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PreExistentes */

$this->title = $model->id_pre_existente;
$this->params['breadcrumbs'][] = ['label' => 'Preexistentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pre-existentes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_pre_existente], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_pre_existente], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza de que deseja excluir este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_pre_existente',
            'desc_pre_existente',
        ],
    ]) ?>

</div>
