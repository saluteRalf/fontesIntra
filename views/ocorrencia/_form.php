<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Cliente;
use app\models\Queixa;
use app\models\Conduta;
use app\models\Equipe;

/* @var $this yii\web\View */
/* @var $model app\models\Ocorrencia */
/* @var $form yii\widgets\ActiveForm */

$queixa = ArrayHelper::map(Queixa::find()->orderBy(['apelido' => SORT_ASC])->all(), 'id', 'apelido');
?>

<div class="ocorrencia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cliente_id')->dropDownList(ArrayHelper::map(Cliente::find()->asArray()->all(), 'id', 'nome'), ['prompt'=>'Selecionar',
		'onchange'=>'
			$.post(
                "' . Url::toRoute('getclientebyid?id=') . '"+ 
                $(this).val(), function(data){
					try {
						var jsonEndereco = JSON.parse(data)[0];
						$("#ocorrencia-cep").val(jsonEndereco["cep"]);
						$("#ocorrencia-estado").val(jsonEndereco["estado"]);
						$("#ocorrencia-municipio").val(jsonEndereco["municipio"]);
						$("#ocorrencia-endereco").val(jsonEndereco["endereco"]);
						$("#ocorrencia-numero").val(jsonEndereco["numero"]);
						$("#ocorrencia-complemento").val(jsonEndereco["complemento"]);
						$("#ocorrencia-referencia").val(jsonEndereco["referencia"]);
					} catch (e) {
						alert(data);
					}
                }
            );
		'])//,'onchange'=>'if '])//'onchange'=>'sugereEndereco(this.value);'])?>

    <?php //$form->field($model, 'queixa_inicial_id')->dropDownList(ArrayHelper::map(Queixa::find()->asArray()->all(), 'id', 'apelido'), ['prompt'=>'Selecionar'])?>
	
	<?= $form->field($model, 'idQueixas')->checkboxList($queixa)->label('Queixas Iniciais') ?>

    <?php // $form->field($model, 'numero_ocorrencia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cep')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'municipio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'endereco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'complemento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'referencia')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'tipo')->textInput() ?>

    <?php // $form->field($model, 'motivo')->textInput() ?>

    <?= $form->field($model, 'avaliacao')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'conduta_id')->dropDownList(ArrayHelper::map(Conduta::find()->asArray()->all(), 'id', 'sigla'), ['prompt'=>'Selecionar'])?>

    <?= $form->field($model, 'equipe_id')->dropDownList(ArrayHelper::map(Equipe::find()->asArray()->all(), 'id', 'nome'), ['prompt'=>'Selecionar'])?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Registrar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
	
	<!--<script>
		function getEnderecoCliente(id_cliente){
			$.post(
				"<?=Url::toRoute('ocorrencia/getClienteById&id')?>",
				{id:id_cliente}, function(data){
					$("#ocorrencia-cep").val(data);
				}
			);
		}
	</script>-->

    <?php ActiveForm::end(); ?>

</div>
