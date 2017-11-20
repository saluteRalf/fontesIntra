<?php

function getEndereco($cep){
	$cep = preg_replace("/[^0-9]/", "", $cep);
	$url = "http://viacep.com.br/ws/$cep/xml/";
	
	$xml = simplexml_load_file($url);
	return $xml;
}

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\TipoCliente;
use app\models\SituacaoPagamento;
use app\models\ClientePree;
use app\models\PreExistentes;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */
/* @var $form yii\widgets\ActiveForm */
$preExistentes = ArrayHelper::map(PreExistentes::find()->orderBy(['desc_pre_existente' => SORT_ASC])->all(), 'id_pre_existente', 'desc_pre_existente');
?>

<div class="cliente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cpf')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo_cliente_id')->dropDownList(ArrayHelper::map(TipoCliente::find()->asArray()->all(), 'id', 'nomenclatura'), ['prompt'=>'Selecionar'])?>

    <?php // $form->field($model, 'pagamento')->textInput() ?>

    <?= $form->field($model, 'cep')->textInput(['maxlength' => true, 'onblur' => 'pesquisa_cep(this.value);']) ?>

    <?= $form->field($model, 'endereco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'complemento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bairro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'municipio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'referencia')->textarea(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'idPreExistentes')->checkboxList($preExistentes)->label('Preexistentes') ?>

    <?= $form->field($model, 'alergias')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'situacao_pagamento_id')->dropDownList(ArrayHelper::map(SituacaoPagamento::find()->asArray()->all(), 'id', 'descricao'), ['prompt'=>'Selecionar'])?>
	
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Salvar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
	function limpa_formulário_cep() {
			//Limpa valores do formulário de cep.
			$('#cliente-endereco').val("");
			$('#cliente-bairro').val("");
			$('#cliente-municipio').val("");
			$('#cliente-estado').val("");
	}

	function meu_callback(conteudo) {
		if (!("erro" in conteudo)) {
			//Atualiza os campos com os valores.
			$('#cliente-endereco').val(conteudo.logradouro);
			$('#cliente-bairro').val(conteudo.bairro);
			$('#cliente-municipio').val(conteudo.localidade);
			$('#cliente-estado').val(conteudo.uf);
		} //end if.
		else {
			//CEP não Encontrado.
			limpa_formulário_cep();
			alert("CEP não encontrado.");
		}
	}
		
	function pesquisa_cep(valor) {

		//Nova variável "cep" somente com dígitos.
		var cep = valor.replace(/\D/g, '');

		//Verifica se campo cep possui valor informado.
		if (cep != "") {

			//Expressão regular para validar o CEP.
			var validacep = /^[0-9]{8}$/;

			//Valida o formato do CEP.
			if(validacep.test(cep)) {

				//Preenche os campos com "..." enquanto consulta webservice.
				$('#cliente-endereco').val("...");
				$('#cliente-bairro').val("...");
				$('#cliente-municipio').val("...");
				$('#cliente-estado').val("..");

				//Cria um elemento javascript.
				var script = document.createElement('script');

				//Sincroniza com o callback.
				script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

				//Insere script no documento e carrega o conteúdo.
				document.body.appendChild(script);

			} //end if.
			else {
				//cep é inválido.
				limpa_formulário_cep();
				alert("Formato de CEP inválido.");
			}
		} //end if.
		else {
			//cep sem valor, limpa formulário.
			limpa_formulário_cep();
		}
	};	
</script>
