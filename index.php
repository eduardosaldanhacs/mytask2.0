<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("define.php");
require("includes/connect.php");
?>

<!doctype html>

<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>MY TASK</title>
	<meta name="keywords" content="">
	<meta name="description" content="">

	<?php
	// DADOS HEAD (ACCESS CONTROL, FAVICON)
	include("includes/head.php");

	// JS/CSS ESSENCIAIS PARA PRIMEIRO CARREGAMENTO DO SITE
	include("includes/essenciais.php");

	// ARQUIVO PARA ALTERAR DADOS GERAIS DE CONTATO (WHATSAPP, INSTAGRAM, EMAIL, ENTRE OUTROS)
	include("includes/dados.php");
	?>

</head>

<body class="fadeIn">

	<!-- LOADER -->
	<!-- <div class="body_ajax">
		<div class="spinner is-animating"></div>
	</div> -->

	<!-- TOPO -->
	<? include('modulos/topo.php'); ?>

	<section>
		<!-- HOME -->
		<?php
		if (!isset($_GET['a']) || $_GET['a'] == 'index') {
			include('modulos/home.php');
		} elseif ($_GET['a'] ==  'cadastro') {
			//echo 'teste';
			include('modulos/janelas/cadastro.php');
		} else if($_GET['a'] == 'painel') {
			include('modulos/painel.php');
		}
		?>
	</section>

	<!-- RODAPÉ -->
	<footer>
		<?php include("modulos/rodape.php") ?>
	</footer> 

	<?php
	// WHATSAPP FLUTUANTE
	include("modulos/whats.php");

	//JS/CSS NÃO ESSENCIAIS
	include("includes/nao-essenciais.php");

	// SCRIPTS DO SITE
	include("includes/scripts.php");
	?>
</body>

</html>