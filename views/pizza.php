<?php
	$slug = $_GET['slug'];
	$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.pizzas` WHERE slug = ?");
	$sql->execute(array($slug));
	if($sql->rowCount() == 0){
		Painel::alert('erro','A pizza que você quer achar não existe!');
		die();
	}

	$pizzas = $sql->fetch();

?>


<html>
    <head>
        <title><?php echo $pizzas['nome'] ?></title>
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
                       <a href="/"><img alt="Logomarca da Pizzaria" title="logo" src="<?php echo INCLUDE_PATH?>imagens/logo.png"/></a>
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
                        <li><a href="javascript:void(0);"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Carrinho(<?php echo pizzariaModel::getTotalItemsCarrinho(); ?>)</a></li>
                        <li><a href="<?php echo INCLUDE_PATH?>#menu">Menu</a></li>
                        <li><a href="<?php echo INCLUDE_PATH?>#contato">Contato</a></li>
                    </ul>
               </nav><!--mobile-->

                 <div class="clear"></div>
           </header>

           <section class="pizza-single">
                    <div class="center">
                           <div class="pizza-wraper">
                               <img alt="Pizza da Pizzaria Online" title="pizza menu" src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $pizzas['imagem']; ?>"/>
                         
                                <h2><?php echo $pizzas['nome']; ?></h2>
                                <p><?php echo $pizzas['descricao']; ?></p>
                                <p class="preco">R$<?php echo Painel::convertMoney($pizzas['preco']) ?></p>
                                <a href="<?php echo INCLUDE_PATH?>?addCart=<?php echo $pizzas['id']; ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Adicionar ao carinho</a>
                           </div><!--pizza-wraper-->
                    </div>
           </section><!--pizza-single-->

           <footer>
                 <a href="/">Pizzaria Online</a>
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