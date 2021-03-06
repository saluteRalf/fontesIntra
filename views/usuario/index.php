<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Colaboradores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Registrar novo colaborador', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
			'cpf',
            'nome',
            [
				'label' => 'Função',
                'format' => 'ntext',
				'attribute' => 'nomenclatura',
                'value' => function($model) {
                    return $model->tipoUsuario->nomenclatura;
                },
            ],
			'nr_classe',
            //'senha',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
