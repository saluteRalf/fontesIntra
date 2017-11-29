<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ocorrencia */

$this->title = 'Ocorrência '.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ocorrências', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ocorrencia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute'=> 'cliente_id',
                'value' => $model->cliente->nome,
            ],
            //'numero_ocorrencia',
            'cep',
            'estado',
            'municipio',
            'endereco',
            'numero',
            'complemento',
            'referencia',
            /*[
                'attribute'=> 'queixa_inicial_id',
                'value' => $model->queixaInicial->apelido,
            ],*/
			[
                'attribute' => 'idQueixas',
                'value' => implode(', ', \yii\helpers\ArrayHelper::map($model->idQueixas, 'id', 'apelido')),
            ],
			'outras_queixas',
            //'tipo',
            //'motivo',
            'avaliacao:ntext',
            [
                'attribute'=> 'conduta_id',
                'value' => ($model->conduta ? $model->conduta->nomenclatura : '-'),
            ],
        ],
    ]) ?>

</div>
