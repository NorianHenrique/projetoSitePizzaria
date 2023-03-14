
<html>
<?php
	if(!isset($_SESSION['carrinho'])){
		die('Você não tem items no carrinho!');
	}

?>
<head>
        <title>Pedidos</title>
        <script src="https://kit.fontawesome.com/5506a4acb1.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">
        <link href="<?php echo INCLUDE_PATH?>views/css/style.css" rel="stylesheet"/>
        <meta name="viewport" content="width= device-width, initial-scale=1.0">
        <meta name="author" content="Norian Henrique - NADSistemas">
        <meta name="keywords" content="pizzas,pratos,ingrendientes,cardapio,pizza-doce,pizza-salgada.">
        <meta name="description" content="Pizzaria Online - Vendas de pizzas doces e salgadas - Pizzas saborosas e magicas para voce sentir o sabor.">
        <meta name="robots" content="index/follow">
        <meta charset="utf-8" />

    </head>
<body>
        
    <base base="<?php echo INCLUDE_PATH?>"/>

	
	<div class="sucesso"><i class="fa fa-check"></i> Formulário enviado com sucesso!</div>
           <header>
                 <div class="logo">
                       <a href="<?php echo INCLUDE_PATH?>"><img alt="Logomarca da Pizzaria" title="logo" src="<?php echo INCLUDE_PATH?>imagens/logo.png"/></a>
                 </div><!--logo-->

                 <div class="redes-sociais">
                        <a style="color:#d42460" target="_blank" href=""><i class="fab fa-instagram"></i></a>
                        <a style="color:#2991e6" target="_blank" href=""><i class="fab fa-facebook"></i></a>
                        <a style="color:#46a9fa" target="_blank" href=""> <i class="fa-brands fa-twitter"></i></a>
                 </div><!--redes-socias-->                      

                 <nav class="menu-desktop">
                       <ul>
                          <li><a href="<?php echo INCLUDE_PATH?>">Home</a></li>
                          <li><a href="<?php echo INCLUDE_PATH?>#sobre">Sobre</a></li>
                          <li><a target="_blank" href="<?php echo INCLUDE_PATH?>fechar-pedido">Ver pedido</a></li>
                          <li><a href="javascript:void(0);"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Carrinho(<?php echo pizzariaModel::getTotalItemsCarrinho(); ?>)</a></li>
                          <li><a href="<?php echo INCLUDE_PATH?>#menu">Menu</a></li>
                          <li><a href="<?php echo INCLUDE_PATH?>#contato">Contato</a></li>
                       </ul>
                 </nav><!--menu-desktop-->

                 <nav class="menu-mobile">
                    <div class="bottun-menu-mobile">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </div>
                    <ul>
                        <li><a href="<?php echo INCLUDE_PATH?>">Home</a></li>
                        <li><a href="<?php echo INCLUDE_PATH?>#sobre">Sobre</a></li>
                        <li><a target="_blank" href="<?php echo INCLUDE_PATH?>fechar-pedido">Ver pedido</a></li>
                        <li><a href="javascript:void(0);"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Carrinho(<?php echo pizzariaModel::getTotalItemsCarrinho(); ?>)</a></li>
                        <li><a href="<?php echo INCLUDE_PATH?>#menu">Menu</a></li>
                        <li><a href="<?php echo INCLUDE_PATH?>#contato">Contato</a></li>
                    </ul>
               </nav><!--mobile-->

                 <div class="clear"></div>
           </header>

 

	<div class="carrinho">
		 <div class="center">
	<table width="100%">
		<tr>
			<td>#</td>
			<td>Preço</td>
		</tr>
		<?php
			@$itemsCarrinho =   pizzariaModel::getItemsCart();
			$total = 0;
			foreach (@$itemsCarrinho as $key => $value) {
			
			$idProduto = $key;
			$produto = \MySql::conectar()->prepare("SELECT * FROM `tb_admin.pizzas` WHERE id = $idProduto");  
			$produto->execute();
			$produto = $produto->fetch();
			$valor = $value * $produto['preco'];
			$total+=$valor;
		?>
			<tr>
				<td>
					<img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $produto['imagem']; ?>" />
				</td>
				<td>
					<p>R$<?php echo Painel::convertMoney($valor); ?></p>
				</td>
			</tr>

		<?php
			}
		?>

		
	</table>
	<br />

	<p>Total: R$<?php echo Painel::convertMoney($total); ?></p>
	<br />
	<br />

	<form method="post">
	   
		<br/>
		<br/>
		<p>Escolha seu método de pagamento:</p>
		<select name="opcao_pagamento">
			<option value="cartao credito">Cartão de Crédito</option>
			<option value="cartao debito">Cartão de Debito</option>
			<option value="dinheiro">Dinheiro</option>
		</select>
		<div style="display: block;" class="troco">
		<p>Troco para quanto?</p>
		<input type="text" name="troco">
		</div>
		<input type="submit" name="acao" value="Fechar Pedido!">
	</form>
	

	<br />

	<br />

	<?php
		if(isset($_POST['acao'])){
			if(!isset($_SESSION['carrinho'])){
				die('você não tem items no carrinho!');
			}
			$metodoPagamento = $_POST['opcao_pagamento'];
			$_SESSION['tipo_pagamento'] = $metodoPagamento;
			$_SESSION['total'] =  pizzariaModel::getTotalPedido();
			if($metodoPagamento == 'dinheiro'){
				if($_POST['troco'] != ''){
					$valorTroco = $_POST['troco'] -  pizzariaModel::getTotalPedido();
					if($valorTroco >= 0){
					$_SESSION['valor_troco'] = $valorTroco;
					}else{
						die('Você não especificou um valor correto para o troco!');
					}

				}else{
					die('você escolheu dinheiro como pagamento, portanto precisa especificar o troco!');
				}
			
			}
		
			echo '<script>alert("Seu pedido foi efetuado com sucesso!")</script>';
			Painel::redirect(INCLUDE_PATH.'historico');
			
		}
	?>

</div>

</div>
        <footer>
                 <a href="<?php echo INCLUDE_PATH?>">Pizzaria Online</a>
                 <p>Lages - Santa Catarina</p>
                 <p>Rua Centro - 999</p>
                 <p>Todos os direitos reservados!</p> 
      </footer>

           <script src="<?php echo INCLUDE_PATH?>js/jquery.js"></script>
           <script src="<?php echo INCLUDE_PATH?>js/slick.min.js"></script>
           <script src="<?php echo INCLUDE_PATH?>js/constants.js"></script>
           <script src="<?php echo INCLUDE_PATH?>js/scripts.js"></script>
           <script src="<?php echo INCLUDE_PATH?>js/formularios.js"></script>
           <script src="<?php echo INCLUDE_PATH?>js/slider.js"></script>
           <script src="<?php echo INCLUDE_PATH?>js/exemplo.js"></script>

    </body>
</html>