<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OcorrenciaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ocorrências';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ocorrencia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Registrar ocorrência', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'cliente_id',
            //'numero_ocorrencia',
            //'cep',
            //'estado',
            // 'municipio',
            // 'endereco',
            // 'numero',
            // 'complemento',
            // 'referencia',
            // 'queixa_inicial_id',
            // 'tipo',
            // 'motivo',
            // 'avaliacao:ntext',
            // 'conduta_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
