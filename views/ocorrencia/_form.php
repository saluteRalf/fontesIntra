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

$this->registerJs(
    "$('#ocorrencia-idqueixas option').mousedown(function(e) {
		e.preventDefault();
		var originalScrollTop = $(this).parent().scrollTop();
		$(this).prop('selected', $(this).prop('selected') ? false : true);
		var self = this;
		$(this).parent().focus();
		setTimeout(function() {
			$(self).parent().scrollTop(originalScrollTop);
		}, 0);
		return false;
	});"
);
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
						$("#ocorrencia-cep").val("");
						$("#ocorrencia-estado").val("");
						$("#ocorrencia-municipio").val("");
						$("#ocorrencia-endereco").val("");
						$("#ocorrencia-numero").val("");
						$("#ocorrencia-complemento").val("");
						$("#ocorrencia-referencia").val("");
					}
                }
            );
		'])//,'onchange'=>'if '])//'onchange'=>'sugereEndereco(this.value);'])?>
	
	<?= $form->field($model, 'idQueixas')->listBox($queixa, ['multiple' => 'multiple'])->label('Queixas Iniciais') ?>

    <?= $form->field($model, 'outras_queixas')->textInput(['maxlength' => true])?>

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

    <?php ActiveForm::end(); ?>

</div>
