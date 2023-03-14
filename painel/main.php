<?php
	if(isset($_GET['loggout'])){
		Painel::loggout();
	}
?>

<html>
<head>
	<title>Painel de Controle</title>
    <link href="https: //fonts.googleapis.com/css2? family = Montserrat: wght @ 300; 400; 700 & display = swap "rel =" stylesheet ">
     <meta charset="utf-8"/>  
     <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0"> 
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL?>css/jquery-ui.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/stefangabos/Zebra_Datepicker/dist/css/default/zebra_datepicker.min.css">
	<link href="<?php echo INCLUDE_PATH_PAINEL ?>css/style.css" rel="stylesheet" />
	<link rel="shortcut icon" type="image=x/png" href="icone.ico">
</head>
<body>

<base base="<?php echo INCLUDE_PATH_PAINEL ?>" />
<div class="menu">
	<div class="menu-wraper">
	<div class="box-usuario">
		<?php
			if($_SESSION['img'] == ''){
		?>
			<div class="avatar-usuario">
				<i class="fa fa-user"></i>
			</div><!--avatar-usuario-->
		<?php }else{ ?>
			<div class="imagem-usuario">
				<img src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $_SESSION['img']; ?>" />
			</div><!--avatar-usuario-->
		<?php } ?>
		<div class="nome-usuario">
			<p><?php echo $_SESSION['nome']; ?></p>
			<p><?php echo pegaCargo($_SESSION['cargo']); ?></p>
		</div><!--nome-usuario-->
	</div><!--box-usuario-->
	<div class="items-menu">

	<h2>Gestão de Pratos</h2>
		<a <?php selecionadoMenu('cadastrar-categorias'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-categorias">Cadastrar Categorias</a>
		<a <?php selecionadoMenu('gerenciar-categorias'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-categorias">Gerenciar Categorias</a>
		<a <?php selecionadoMenu('cadastrar-pizzas'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-pizzas">Cadastrar Pizzas</a>
		<a <?php selecionadoMenu('gerenciar-pizzas'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-pizzas">Gerenciar Pizzas</a>
	<h2>Gestão de clientes</h2>
	    <a <?php selecionadoMenu('adicionar-depoimentos'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>adicionar-depoimentos">Cadastrar Depoimento</a>
	    <a <?php selecionadoMenu('listar-depoimentos'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-depoimentos">Listar Depoimento</a>
		<a <?php selecionadoMenu('cadastrar-clientes'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-clientes">Cadastrar Clientes</a>
		<a <?php selecionadoMenu('gerenciar-clientes'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-clientes">Gerenciar Clientes</a>
	<h2>Configuração Geral</h2>
		<a <?php selecionadoMenu('editar-site'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>editar-site">Editar Site</a>
		
	</div><!--items-menu-->
	</div><!--menu-wraper-->
</div><!--menu-->

<header>
	<div class="center">
		<div class="menu-btn">
			<i class="fa fa-bars"></i>
		</div><!--menu-btn-->

		<div class="loggout">
			<a <?php if(@$_GET['url'] == 'chat'){ ?> style="background: #1976d2;padding: 15px;" <?php } ?> href="<?php echo INCLUDE_PATH_PAINEL ?>chat"><i class="fa fa-comment"></i> <span>Chat Online</span></a>
			<a <?php if(@$_GET['url'] == ''){ ?> style="background: #1976d2;padding: 15px;" <?php } ?> href="<?php echo INCLUDE_PATH_PAINEL ?>"> <i class="fa fa-home"></i> <span>Página Inicial</span></a>
			<a href="<?php echo INCLUDE_PATH_PAINEL ?>?loggout"> <i class="fa fa-window-close"></i> <span>Sair</span></a>
		</div><!--loggout-->

		<div class="clear"></div>
	</div>
</header>

<div class="content">
	<?php 
		Painel::carregarPagina(); 
	?>
</div><!--content-->

 <script src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script>
<?php Painel::loadJS(array('jquery-ui.min.js'),'listar-empreendimentos'); ?>
<script src="https://cdn.jsdelivr.net/gh/stefangabos/Zebra_Datepicker/dist/zebra_datepicker.min.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/jquery.maskMoney.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/jquery.mask.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/jquery.ajaxform.js"></script>
<script src="<?php echo INCLUDE_PATH ?>js/constants.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/main.js"></script>
 <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>
  tinymce.init({ 
  	selector:'.tinymce',
  	plugins: "image",
  	height:300
   });
  </script>
  <script src="<?php echo INCLUDE_PATH_PAINEL?>js/helperMask.js"></script>
  <?php Painel::loadJS(array('ajax.js'),'gerenciar-clientes'); ?>
  <?php Painel::loadJS(array('ajax.js'),'cadastrar-clientes'); ?>
  <?php Painel::loadJS(array('ajax.js'),'editar-cliente'); ?>
  <?php Painel::loadJS(array('controleFinanceiro.js'),'editar-cliente'); ?>
   <?php Painel::loadJS(array('empreendimentos.js'),'listar-empreendimentos'); ?>
    <?php Painel::loadJS(array('chat.js'),'chat'); ?>
    <?php Painel::loadJS(array('calendario.js'),'calendario'); ?>
</body>
</html>