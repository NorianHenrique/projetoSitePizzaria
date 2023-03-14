<?php
	if(isset($_GET['excluir'])){
		$idExcluir = intval($_GET['excluir']);
		$selectImagem = MySql::conectar()->prepare("SELECT imagem FROM `tb_admin.pizzas` WHERE id = ?");
		$selectImagem->execute(array($_GET['excluir']));

		$imagem = $selectImagem->fetch()['imagem'];
		Painel::deleteFile($imagem);
		Painel::deletar('tb_admin.pizzas',$idExcluir);
		Painel::redirect(INCLUDE_PATH_PAINEL.'gerenciar-pizzas');
	}else if(isset($_GET['order']) && isset($_GET['id'])){
		Painel::orderItem('tb_admin.pizzas',$_GET['order'],$_GET['id']);
	}

	$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$porPagina = 4;
	
	$noticias = Painel::selectAll('tb_admin.pizzas',($paginaAtual - 1) * $porPagina,$porPagina);
	
?>
<div class="box-content">
	<h2><i class="fa fa-id-card-o" aria-hidden="true"></i> Pizzas Cadastradas</h2>
	<div class="wraper-table">
	<table>
		<tr>
			<td>Nome</td>
			<td>Categoria</td>
			<td>Preço</td>
			<td>Imagem</td>
			<td>#</td>
			<td>#</td>
			<td>#</td>
			<td>#</td>
		</tr>

		<?php
			foreach ($noticias as $key => $value) {
			$nomeCategoria = Painel::select('tb_site.categoria','id=?',array($value['categoria_id']))['nome'];
		?>
		<tr>
			<td><?php echo $value['nome']; ?></td>
			<td><?php echo $nomeCategoria; ?></td>
            <td>Preço:</b> R$<?php echo Painel::convertMoney($value['preco']); ?></td>
			<td><img style="width: 100px;height:100px;" src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['imagem']; ?>" /></td>
			<td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-pizza?id=<?php echo $value['id']; ?>"><i class="fa fa-pencil"></i> Editar</a></td>
			<td><a actionBtn="delete" class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-pizzas?excluir=<?php echo $value['id']; ?>"><i class="fa fa-times"></i> Excluir</a></td>
			<td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-pizzas?order=up&id=<?php echo $value['id'] ?>"><i class="fa fa-angle-up"></i></a></td>
			<td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-pizzas?order=down&id=<?php echo $value['id'] ?>"><i class="fa fa-angle-down"></i></a></td>
		</tr>

		<?php } ?>

	</table>
	</div>

	<div class="paginacao">
		<?php
			$totalPaginas = ceil(count(Painel::selectAll('tb_admin.pizzas')) / $porPagina);

			for($i = 1; $i <= $totalPaginas; $i++){
				if($i == $paginaAtual)
					echo '<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'gerenciar-pizzas?pagina='.$i.'">'.$i.'</a>';
				else
					echo '<a href="'.INCLUDE_PATH_PAINEL.'gerenciar-pizzas?pagina='.$i.'">'.$i.'</a>';
			}

		?>
	</div><!--paginacao-->


</div><!--box-content-->