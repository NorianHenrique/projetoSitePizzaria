<div class="box-content">
	<h2><i class="fa fa-user-tie"></i> Clientes Cadastrados</h2>
	<div class="busca">
		<h4><i class="fa fa-search"></i> Realizar uma busca</h4>
		<form method="post">
			<input placeholder="Procure por: nome, rua, cpf ou cnpj" type="text" name="busca">
			<input type="submit" name="acao" value="Buscar!">
		</form>
	</div><!--busca-->
	<div class="boxes">
	<?php
		$query = "";
		if(isset($_POST['acao'])){
			$busca = $_POST['busca'];
			$query = " WHERE nome LIKE '%$busca%' OR rua LIKE '%$busca%' OR cpf_cnpj LIKE '%$busca%'";
		}
		$clientes = MySql::conectar()->prepare("SELECT * FROM `tb_admin.clientes` $query");
		$clientes->execute();
		$clientes = $clientes->fetchAll();
		if(isset($_POST['acao'])){
			echo '<div style="width:100%;" class="busca-result"><p>Foram encontrados <b>'.count($clientes).'</b> resultado(s)</p></div>';
		}
		foreach($clientes as $value){
	?>
		<div class="box-single-wraper">
			<div class="box-single">
				<div class="topo-box">
					
					<h2><i class="fa fa-user"></i></h2>
					
				</div><!--topo-box-->
				<div class="body-box">
					<p><b><i class="fa fa-pencil"></i> Nome do cliente:</b> <?php echo $value['nome']; ?></p>
					<p><b><i class="fa fa-pencil"></i> Bairro:</b> <?php echo $value['bairro']; ?></p>
                    <p><b><i class="fa fa-pencil"></i> Rua:</b> <?php echo $value['rua']; ?></p>
                    <p><b><i class="fa fa-pencil"></i> Numero de sua residencia:</b> <?php echo $value['numero_rua']; ?></p>
					<p><b><i class="fa fa-pencil"></i> Tipo:</b> <?php echo ucfirst($value['tipo']); ?></p>
					<p><b><i class="fa fa-pencil"></i> <?php
						if($value['tipo'] == 'fisico')
							echo 'CPF: ';
						else
							echo 'CNPJ: ';
					 ?>:</b> <?php echo $value['cpf_cnpj']; ?></p>
					<div class="group-btn">
						<a class="btn delete" item_id="<?php echo $value['id']; ?>" href="<?php echo INCLUDE_PATH_PAINEL ?>"><i class="fa fa-times"></i> Excluir</a>
						<a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-cliente?id=<?php echo $value['id']; ?>"><i class="fa fa-pencil"></i> Editar</a>
					</div><!--group-btn-->
				</div><!--body-box-->
			</div><!--box-single-->
		</div><!--box-single-wraper-->

		<?php } ?>

		<div class="clear"></div>

	</div><!--boxes-->

</div><!--box-content-->