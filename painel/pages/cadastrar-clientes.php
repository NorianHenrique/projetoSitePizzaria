<?php
	verificaPermissaoPagina(2);
?>
<div class="box-content">
	<h2><i class="fa fa-user-tie"></i> Cadatrar Clientes</h2>

	<form class="ajax" action="<?php echo INCLUDE_PATH_PAINEL ?>ajax/forms.php" method="post" enctype="multipart/form-data">

		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome">
		</div><!--form-group-->

		<div class="form-group">
			<label>Bairro:</label>
			<input type="text" name="bairro">
		</div><!--form-group-->

        <div class="form-group">
			<label>Rua:</label>
			<input type="text" name="rua">
		</div><!--form-group-->

        <div class="form-group">
			<label>Numero da residencia:</label>
			<input type="text" name="numero_rua">
		</div><!--form-group-->

		<div class="form-group">
			<label>Tipo:</label>
			<select name="tipo_cliente">
				<option value="fisico">Fisico</option>
				<option value="juridico">Jurídico</option>
			</select>
		</div><!--form-group-->

		<div ref="cpf" class="form-group">
			<label>CPF</label>
			<input type="text" name="cpf" />
		</div><!--form-group-->

		<div style="display: none;" ref="cnpj" class="form-group">
			<label>CNPJ</label>
			<input type="text" name="cnpj" />
		</div><!--form-group-->
		
		
		<div class="form-group">
			<input type="hidden" name="tipo_acao" value="cadastrar_cliente">
		</div>
		<div class="form-group">
			<input type="submit" name="acao" value="Cadastrar!">
		</div><!--form-group-->

	</form>



</div><!--box-content-->