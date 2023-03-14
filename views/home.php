<?php
  $infoSite = MySQL::conectar()->prepare("SELECT * FROM `tb_site.config`");
  $infoSite->execute();
  $infoSite=$infoSite->fetch();
?>
<html>
    <head>
        <title><?php echo $infoSite['titulo']  ?></title>
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

           <section class="banner">
                   <img  alt="Banner da Pizzaria" title="banner" src="<?php echo INCLUDE_PATH?>imagens/banner.jpg"/>
           </section><!--banner-->

           <section class="destaques " id="sobre">
                  <h2>Nosso diferencial</h2>
                <div class="center">

                      <div class="diferencial">
                            <i class="<?php echo $infoSite['icone1']?>"></i>
                            <h3>Variedade do cardápio</h3>
                            <p><?php echo $infoSite['descricao1']?></p>
                      </div><!--direcial-->

                      <div class="diferencial">
                            <i class="<?php echo $infoSite['icone2']?>"></i>
                            <h3>Qualidade dos ingredientes</h3>
                            <p><?php echo $infoSite['descricao2'] ?></p>
                      </div><!--direcial-->

                      <div class="diferencial">
                            <i class="<?php echo $infoSite['icone3'] ?>"></i>
                            <h3>Serviço ao cliente</h3>
                            <p><?php echo $infoSite['descricao3'] ?></p>
                      </div><!--direcial-->

                      <div class="diferencial">
                            <i class="<?php echo $infoSite['icone4']?>"></i>
                            <h3>Ambiente</h3>
                            <p><?php echo $infoSite['descricao4'] ?></p>
                      </div><!--direcial-->

                      <div class="diferencial">
                            <i class="<?php echo $infoSite['icone5'] ?>"></i>   
                            <h3>Preço</h3>
                            <p><?php echo $infoSite['descricao5']?></p>
                      </div><!--direcial-->

                      <div class="diferencial">
                            <i class="<?php echo $infoSite['icone6'] ?>"></i>
                            <h3>Promoções e ofertas</h3>
                            <p><?php echo $infoSite['descricao6'] ?></p>
                      </div><!--direcial-->

                      <div class="destaque-brinde">
                              <h3>Muito além da pizza..</h3>
                             <img alt="Destaque Brinde da Pizzaria" title="brinde" src="<?php echo INCLUDE_PATH?>imagens/bride.webp"/>
                      </div><!--destaque-brinde-->


                </div>
           </section><!--destaques-->

           <section class="menu" id="menu">
                <h1>Nosso Menu - Escolha o seu prato</h1>

                <div class="busca">
                    <h4><i class="fa fa-search"></i> Realizar uma busca</h4>
                    <form method="post">
                        <input placeholder="Procure por: nome" type="text" name="busca">
                        <input type="submit" name="acao" value="Buscar!">
                      </form>
                </div><!--busca-->

                <div class="center">

                <?php
                        $query = "";
                        if(isset($_POST['acao'])){
                              $busca = $_POST['busca'];
                              $query = " WHERE nome LIKE '%$busca%'";
                        }
                        $pizzas = MySql::conectar()->prepare("SELECT * FROM `tb_admin.pizzas` $query");
                        $pizzas->execute();
                        $pizzas = $pizzas->fetchAll();
                        if(isset($_POST['acao'])){
                              echo '<div style="width:100%;" class="busca-result"><p>Foram encontrados <b>'.count($pizzas).'</b> resultado(s)</p></div>';
                        }
                        foreach($pizzas as $value){
                        $sql = MySql::conectar()->prepare("SELECT `slug` FROM `tb_site.categoria` WHERE id = ?");
                        $sql->execute(array($value['categoria_id']));
                        $categoriaNome = $sql->fetch()['slug'];
                                                                                    
                    ?>
              
                <div class="menu-pizzas">
                       <img alt="Pizza da Pizzaria Online" title="pizza menu" src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['imagem']; ?>"/>
                       <h2><?php echo $value['nome'] ?></h2>
                       <p>R$<?php echo Painel::convertMoney($value['preco']) ?></p>
                       <a href="<?php echo INCLUDE_PATH ?>pizza?slug=<?php echo $value['slug']; ?>">Ver mais</a>
                </div><!--menu-pizzas-->

                <?php } ?>
              

                </div>
           </section><!--menu-->

           <section class="depoimentos" id="depoimentos">
	                <div class="center">
    
		         <h2>Depoimentos</h2>
          
			    <div class="depoimentos-box">
                        <?php
                               $depoimentos = \pizzariaModel::getDepoimentos();
                               foreach ($depoimentos as $key => $value){ 
                        ?>
                
			        <div class="depoimento-single">
                              <p><?php echo $value ['depoimento'] ?></p>
                              <p><?php echo $value ['nome'] ?></p>
                              <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['foto'] ?>" />
				    </div><!--depoimento-single-->
                        <?php }?>

			      
		  	</div><!--depoimentos-box-->
           
	  	</div>
	  </section><!--depoimentos-->

      <section class="contato" id="contato">
              <div class="center">
                       <div class="contato-form">
                             <h2>Contato</h2>
                             <form class="ajax-form" method="post">
                                  <input type="text" name="nome" placeholder="Seu nome"/>
                                  <input type="email" name="email" placeholder="Seu email"/>
                                  <input type="text" name="telefone" placeholder="Seu telefone"/>
                                  <textarea name="mensagem" placeholder="Sua mensagem"></textarea>
                                  <input type="submit" name="acao" value="Enviar!"/>
                             </form>
                       </div><!--contato-form-->

                       <div class="map-contato">
                           <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="350px" id="gmap_canvas" src="https://maps.google.com/maps?q=Rua%20lavinia%20pereira%20de%20souza&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.whatismyip-address.com/divi-discount/"></a><br><style>.mapouter{position:relative;text-align:center;height:500px;width:100%;}</style><a href="https://www.embedgooglemap.net"></a><style>.gmap_canvas {overflow:hidden;background:none!important;height:350px;width:100%;border: 1px solid #ccc;}</style></div></div>
                       </div><!--map-contato-->

                  <div class="clear"></div>
              </div>
      </section><!--contato-->

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

           <script>
            $('section.depoimentos .depoimentos-box').slick({
                dots: true,
                arrows:false,
                speed:1000,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                pauseOnHover:false,
                });
          </script>

  
    </body>
</html>