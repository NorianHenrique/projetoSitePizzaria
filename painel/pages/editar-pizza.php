<?php
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$slide = Painel::select('tb_admin.pizzas','id = ?',array($id));
	}else{
		Painel::alert('erro','Você precisa passar o parametro ID.');
		die();
	}
?>
<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Editar Pizza</h2>

	<form method="post" enctype="multipart/form-data">

		<?php
			if(isset($_POST['acao'])){
				//Enviei o meu formulário.
				
				$nome = $_POST['nome'];
				$descricao = $_POST['descricao'];
                $preco = Painel::formatarMoedaBd($_POST['preco']);
				$imagem = $_FILES['imagem'];
				$imagem_atual = $_POST['imagem_atual'];
				$verifica = MySql::conectar()->prepare("SELECT `id` FROM `tb_admin.pizzas` WHERE nome = ? AND categoria_id = ? AND id != ?");
				$verifica->execute(array($nome,$_POST['categoria_id'],$id));
				if($verifica->rowCount() == 0){
				if($imagem['name'] != ''){
					//Existe o upload de imagem.
					if(Painel::imagemValida($imagem)){
						Painel::deleteFile($imagem_atual);
						$imagem = Painel::uploadFile($imagem);
						$slug = Painel::generateSlug($nome);
						$arr = ['nome'=>$nome,'categoria_id'=>$_POST['categoria_id'],'descricao'=>$descricao,'preco'=>$preco,'imagem'=>$imagem,'slug'=>$slug,'id'=>$id,'nome_tabela'=>'tb_admin.pizzas'];
						Painel::update($arr);
						$slide = Painel::select('tb_admin.pratos','id = ?',array($id));
						Painel::alert('sucesso','A pizza foi editada com junto com a imagem!');
					}else{
						Painel::alert('erro','O formato da imagem não é válido');
					}
				}else{
					$imagem = $imagem_atual;
					$slug = Painel::generateSlug($nome);
					$arr = ['nome'=>$nome,'categoria_id'=>$_POST['categoria_id'],'descricao'=>$descricao,'preco'=>$preco,'imagem'=>$imagem,'slug'=>$slug,'id'=>$id,'nome_tabela'=>'tb_admin.pizzas'];
					Painel::update($arr);
					$slide = Painel::select('tb_admin.pizzas','id = ?',array($id));
					Painel::alert('sucesso','O prato foi editada com sucesso!');
				}
				}else{
					Painel::alert('erro','Já existe uma pizza com este nome!');
				}

			}
		?>

		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome" required value="<?php echo $slide['nome']; ?>">
		</div><!--form-group-->
        
        <div class="form-group">
			<label>Descrição:</label>
			<input type="text" name="descricao"  value="<?php echo $slide['descricao']; ?>">
		</div><!--form-group-->

        <div class="form-group">
			<label>Preço da Pizza:</label>
			<input type="text" name="preco" value="<?php echo $slide['preco']; ?>">
		</div><!--form-group-->

		<div class="form-group">
		<label>Categoria:</label>
		<select name="categoria_id">
			<?php
				$categorias = Painel::selectAll('tb_site.categoria');
				foreach ($categorias as $key => $value) {
			?>
			<option <?php if($value['id'] == $slide['categoria_id']) echo 'selected'; ?> value="<?php echo $value['id'] ?>"><?php echo $value['nome']; ?></option>
			<?php } ?>
		</select>
		</div>

		<div class="form-group">
			<label>Imagem</label>
			<input type="file" name="imagem"/>
			<input type="hidden" name="imagem_atual" value="<?php echo $slide['imagem']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<input type="submit" name="acao" value="Atualizar!">
		</div><!--form-group-->

	</form>



</div><!--box-content-->