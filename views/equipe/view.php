<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Conduta;

/* @var $this yii\web\View */
/* @var $model app\models\Equipe */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Equipes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipe-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->id], [
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
            //'id',
            [
                'attribute' => 'classificacao_id',
                'value' => $model->classificacao->sigla,
            ],
            'nome',
            //'descricao:ntext',
            [
                'attribute' => 'motorista_id',
                'value' => ($model->motorista ? $model->motorista->nome : '-'),
            ],
            [
                'attribute' => 'tecnico_enfermeiro_id',
                'value' => ($model->tecnicoEnfermeiro ? $model->tecnicoEnfermeiro->nome : '-'),
            ],
            [
                'attribute' => 'enfermeiro_id',
                'value' => ($model->enfermeiro ? $model->enfermeiro->nome : '-'),
            ],
            [
                'attribute' => 'medico_id',
                'value' => ($model->medico ? $model->medico->nome : '-'),
            ],
            //'em_atendimento',
            //'localizacao_atual:ntext',
        ],
    ]) ?>

</div>
