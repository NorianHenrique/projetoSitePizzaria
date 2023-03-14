<?php
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$cliente = Painel::select('tb_admin.clientes','id = ?',array($id));
	}else{
		Painel::alert('erro','Você precisa passar o parametro ID.');
		die();
	}
?>
<div class="box-content">
	<h2><i class="fa fa-user-tie"></i> Editar Cliente</h2>

	<form class="ajax" atualizar method="post" action="<?php echo INCLUDE_PATH_PAINEL ?>ajax/forms.php" enctype="multipart/form-data">

		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome" value="<?php echo $cliente['nome']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Bairro:</label>
			<input type="text" name="bairro" value="<?php echo $cliente['bairro']; ?>">
		</div><!--form-group-->

        <div class="form-group">
			<label>Rua:</label>
			<input type="text" name="rua" value="<?php echo $cliente['rua']; ?>">
		</div><!--form-group-->

        <div class="form-group">
			<label>Numero da residencia:</label>
			<input type="text" name="nemuro_rua" value="<?php echo $cliente['numero_rua']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Tipo:</label>
			<select name="tipo_cliente">
				<option <?php if($cliente['tipo'] == 'fisico') echo 'selected'; ?> value="fisico">Fisico</option>
				<option <?php if($cliente['tipo'] == 'juridico') echo 'selected'; ?> value="juridico">Jurídico</option>
			</select>
		</div><!--form-group-->

		<?php
			if($cliente['tipo'] == 'fisico'){
		?>

		<div ref="cpf" class="form-group">
			<label>CPF</label>
			<input type="text" name="cpf" value="<?php echo $cliente['cpf_cnpj']; ?>" />
		</div><!--form-group-->

		<div style="display: none;" ref="cnpj" class="form-group">
			<label>CNPJ</label>
			<input type="text" name="cnpj" />
		</div><!--form-group-->

		<?php }else{ ?>
		<div style="display: none;" ref="cpf" class="form-group">
			<label>CPF</label>
			<input type="text" name="cpf" />
		</div><!--form-group-->

		<div style="display: block;" ref="cnpj" class="form-group">
			<label>CNPJ</label>
			<input type="text" name="cnpj" value="<?php echo $cliente['cpf_cnpj']; ?>" />
		</div><!--form-group-->

		<?php } ?>
		
		

		<div class="form-group">
			<input type="hidden" name="tipo_acao" value="atualizar_cliente">
		</div>

		<div class="form-group">
			<input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">
		</div>

		<div class="form-group">
			<input type="submit" name="acao" value="Atualizar!">
		</div><!--form-group-->

	</form>
