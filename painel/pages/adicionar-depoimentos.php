<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Cadastrar Depoimentos</h2>

	<form method="post" enctype="multipart/form-data">

		<?php

			if(isset($_POST['acao'])){
				
				$nome = $_POST['nome'];
				$depoimento = $_POST['depoimento'];
				$foto = $_FILES['foto'];
				

				if($nome == '' || $depoimento == ''){
					Painel::alert('erro','Campos Vázios não são permitidos!');
				}else if($foto['tmp_name'] == '' ){
					Painel::alert('erro','A imagem de capa precisa ser selecionada.');
				}else{
					if(Painel::imagemValida($foto)){
						$verifica = MySql::conectar()->prepare("SELECT * FROM `tb_site.depoimentos` WHERE nome= ? ");
						$verifica->execute(array($nome));
						if($verifica->rowCount() == 0){
						$foto = Painel::uploadFile($foto);
						$arr = ['nome'=>$nome,'depoimento'=>$depoimento,'foto'=>$foto,
						'order_id'=>'0',
						'nome_tabela'=>'tb_site.depoimentos'
						];
						if(Painel::insert($arr)){
							Painel::redirect(INCLUDE_PATH_PAINEL.'adicionar-depoimentos?sucesso');
						}

						//Painel::alert('sucesso','O cadastro da notícia foi realizado com sucesso!');
						}else{
							Painel::alert('erro','Já existe um depoimento com esse nome!');
						}
					}else{
						Painel::alert('erro','Selecione uma imagem válida!');
					}
					
				}
				
				
			}
			if(isset($_GET['sucesso']) && !isset($_POST['acao'])){
				Painel::alert('sucesso','O cadastro foi realizado com sucesso!');
			}
		?>
		

		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome" value="<?php recoverPost('nome'); ?>">
		</div><!--form-group-->


		<div class="form-group">
			<label>Depoimento:</label>
			<textarea name="depoimento"><?php recoverPost('depoimento'); ?></textarea>
		</div>

		<div class="form-group">
			<label>Foto</label>
			<input type="file" name="foto"/>
		</div><!--form-group-->

		<div class="form-group">
			<input type="hidden" name="order_id" value="0">
			<input type="hidden" name="nome_tabela" value="tb_site.depoimentos" />
			<input type="submit" name="acao" value="Cadastrar!">
		</div><!--form-group-->

	</form>



</div><!--box-content-->