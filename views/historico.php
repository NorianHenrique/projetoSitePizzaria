<html>
<?php
	if(!isset($_SESSION['tipo_pagamento'])){
		die('Você não tem items no carrinho e não fechou o pedido!');
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

<section class="descricao-home">
		<div class="center">
		
		<div class="pedidos">
		   <h2>Pedido em andamento:</h2>
		   <p>Tipo de pagamento: <?php echo $_SESSION['tipo_pagamento']; ?></p>
		   
		   <p class="total">Total: <?php echo $_SESSION['total']; ?></p>   
<?php
	
	if($_SESSION['tipo_pagamento'] == 'dinheiro'){
		echo '<hr>';
		echo '<p>Troco: '.$_SESSION['valor_troco'].'</p>';
	}

?>
    </div><!--pedidos-->

    <div class="home">
			
	<a href="<?php echo INCLUDE_PATH?>">Voltar Home</a>
		
	</div><!--home-->


   <div class="clear"></div>

		</div><!--center-->
	</section>

	
	
  <section class="tabelas">
 <div class="center">
<h2>Items do seu pedido:</h2>
	<table width="100%">
		<tr>
			<td>#</td>
			<td>Preço</td>
		</tr>
		<?php
			$itemsCarrinho = pizzariaModel::getItemsCart();
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

<br />

<a href="https://api.whatsapp.com/send/?phone=5549998258021&text&type=phone_number&app_absent=0">Fazer Pedido!</a>

<?php
	if(isset($_GET['resetar'])){
		session_destroy();
		header('Location: '.INCLUDE_PATH);
	}
?>
</div>
</section>

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

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script>
		$('select').change(function(){
			if($(this).val() == 'dinheiro'){
				$('.troco').show();
			}else{
				$('.troco').hide();
			}
		})
	</script>



</body>
</html>