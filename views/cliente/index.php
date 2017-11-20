<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Cadastrar novo cliente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'titular',
            'cpf',
            'nome',
            //'pagamento',
            // 'endereco',
            // 'pre_existentes',
            // 'alergias',
			//'numero',
			//'complemento',
			//'bairro',
			//'cep',
			//'municipio',
			//'estado',
			//'referencia',
			[
				'label' => 'Preexistentes',
                'format' => 'ntext',
                'attribute'=>'desc_pre_existente',
                'value' => function($model) {
                    foreach ($model->idPreExistentes as $preExistente) {
                        $descPreexistentes[] = $preExistente->desc_pre_existente;
                    }
                    return implode(", ", $descPreexistentes);
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
