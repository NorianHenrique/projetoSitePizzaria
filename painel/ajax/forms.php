<?php

	include('../../config.php');
	/**/
	$data['sucesso'] = true;
	$data['mensagem'] = "";

	if(Painel::logado() == false){
		die("Você não está logado!");
	}
	
	/*Nosso código começa aqui!*/
	if(isset($_POST['tipo_acao']) && $_POST['tipo_acao'] == 'cadastrar_cliente'){
	sleep(2);
	$nome = $_POST['nome'];
	$bairro = $_POST['bairro'];
	$rua = $_POST['rua'];
	$numero_rua = $_POST['numero_rua'];
	$tipo = $_POST['tipo_cliente'];
	$cpf = '';
	$cnpj = '';
	if($tipo == 'fisico'){
		$cpf = $_POST['cpf'];
	}else if($tipo == 'juridico'){
		$cnpj = $_POST['cnpj'];
	}
	
	if($nome == "" || $bairro == "" || $rua == "" || $numero_rua == "" || $tipo == ""){
		$data['sucesso'] = false;
		$data['mensagem'] = "Atenção: Campos vázios não são permitidos!";
	}else{
			
		$data['sucesso'] = true;
		$data['mensagem'] = "Dados inseridos!.";
	}
	

	if($data['sucesso']){
	
		$sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.clientes` VALUES (null,?,?,?,?,?,?)");
		$dadoFinal = ($cpf == '') ? $cnpj : $cpf;
		$sql->execute(array($nome,$bairro,$rua,$numero_rua,$tipo,$dadoFinal));
		//tudo okay, só cadastrar
		$data['mensagem'] = "O cliente foi cadastrado com sucesso!";
	}

	}else if(isset($_POST['tipo_acao']) && $_POST['tipo_acao'] == 'atualizar_cliente'){
		sleep(2);
		$id = $_POST['id'];
		$nome = $_POST['nome'];
		$bairro = $_POST['bairro'];
	    $rua = $_POST['rua'];
	    $numero_rua = $_POST['numero_rua'];
		$tipo = $_POST['tipo_cliente'];
	
		$cpf = '';
		$cnpj = '';
		if($tipo == 'fisico'){
			$cpf = $_POST['cpf'];
		}else if($tipo == 'juridico'){
			$cnpj = $_POST['cnpj'];
		}

		if($nome == '' || $bairro == '' || $rua == '' || $numero_rua == ''){
			$data['sucesso'] = false;
			$data['mensagem'] = "Campos vázios não são permitidos!";
		}

		if($data['sucesso']){

			$sql = MySql::conectar()->prepare("UPDATE `tb_admin.clientes` SET nome= ?,bairro = ?,rua = ?,numero_rua = ?,tipo=?,cpf_cnpj=?  WHERE id = $id");
			$dadoFinal = ($cpf == '') ? $cnpj : $cpf;
			$sql->execute(array($nome,$bairro,$rua,$numero_rua,$tipo,$dadoFinal));

			$data['mensagem'] = "O cliente foi atualizado com sucesso!";
		}

	}else if(isset($_POST['tipo_acao']) && $_POST['tipo_acao'] == 'deletar_cliente'){
		$id = $_POST['id'];
		MySql::conectar()->exec("DELETE FROM `tb_admin.clientes` WHERE id = $id");
		MySql::conectar()->exec("DELETE FROM `tb_admin.financeiro` WHERE cliente_id = $id");
	}else if(isset($_POST['tipo_acao']) && $_POST['tipo_acao'] == 'ordenar_empreendimentos'){
		$ids = $_POST['item'];
		$i = 1;
		foreach ($ids as $key => $value) {
			MySql::conectar()->exec("UPDATE `tb_admin.empreendimentos` SET order_id = $i WHERE id = $value");
			$i++;
		}
	}

	die(json_encode($data));



?>