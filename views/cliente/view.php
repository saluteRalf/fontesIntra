<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza de que gostaria de deletar esse cliente?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'nome',
            //'titular',
            'cpf',
            [
                'attribute' => 'tipo_cliente_id',
                'value' => $model->tipoCliente->nomenclatura,
            ],
            'endereco',
            'pre_existentes',
            'alergias',
            [
                'attribute' => 'situacao_pagamento_id',
                'value' => $model->situacaoPagamento->descricao,
            ],
        ],
    ]) ?>

</div>
