<?php
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$slide = Painel::select('tb_site.depoimentos','id = ?',array($id));
	}else{
		Painel::alert('erro','Você precisa passar o parametro ID.');
		die();
	}
?>
<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Editar Depoimento</h2>

	<form method="post" enctype="multipart/form-data">

		<?php
			if(isset($_POST['acao'])){
				//Enviei o meu formulário.
				
				$nome = $_POST['nome'];
				$depoimento = $_POST['depoimento'];
				$foto = $_FILES['foto'];
			
				$imagem_atual = $_POST['imagem_atual'];
				$verifica = MySql::conectar()->prepare("SELECT `id` FROM `tb_site.depoimentos` WHERE nome = ?  AND id != ?");
				$verifica->execute(array($nome,$id));
				if($verifica->rowCount() == 0){
				if($foto['name'] != ''){
					//Existe o upload de imagem.
					if(Painel::imagemValida($foto)){
						Painel::deleteFile($imagem_atual);
						$foto = Painel::uploadFile($foto);
						
						$arr = ['nome'=>$nome,'depoimento'=>$depoimento,'foto'=>$foto,'id'=>$id,'nome_tabela'=>'tb_site.depoimentos'];
						Painel::update($arr);
						$slide = Painel::select('tb_site.depoimentos','id = ?',array($id));
						Painel::alert('sucesso','O depoimento foi editado com junto com a foto!');
					}else{
						Painel::alert('erro','O formato da imagem não é válido');
					}
				}else{
					$foto = $imagem_atual;
					$slug = Painel::generateSlug($nome);
					$arr = ['nome'=>$nome,'depoimento'=>$depoimento,'foto'=>$foto,'id'=>$id,'nome_tabela'=>'tb_site.depoimentos'];
					Painel::update($arr);
					$slide = Painel::select('tb_site.depoimentos','id = ?',array($id));
					Painel::alert('sucesso','O depoimento foi editado com sucesso!');
				}
				}else{
					Painel::alert('erro','Já existe um depoimento com este nome!');
				}

			}
		?>

		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome" required value="<?php echo $slide['nome']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Depoimento:</label>
			<textarea  name="depoimento"><?php echo $slide['depoimento']; ?></textarea>
		</div><!--form-group-->


		<div class="form-group">
			<label>Foto</label>
			<input type="file" name="foto"/>
			<input type="hidden" name="imagem_atual" value="<?php echo $slide['foto']; ?>">
		</div><!--form-group-->

		

		<div class="form-group">
			<input type="submit" name="acao" value="Atualizar!">
		</div><!--form-group-->

	</form>



</div><!--box-content-->