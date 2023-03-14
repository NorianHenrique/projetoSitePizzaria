<?php
	class pizzariaModel{

		
		public static function getLojaItems(){
			$items = \MySql::conectar()->prepare("SELECT * FROM `tb_admin.pizzas` ");
			$items->execute();
			return $items->fetchAll();
		}

		public static function getDepoimentos(){
			$sql= \MySql::conectar()->prepare("SELECT * FROM `tb_site.depoimentos` ");
			$sql->execute();
			return $sql->fetchAll();
		}

		public static function addToCart($idProduto){
			if(!isset($_SESSION['carrinho'])){
				$_SESSION['carrinho'] = array();
			}
			$_SESSION['carrinho'][] = $idProduto;
		}

		public static function getItemsCart(){
			return $_SESSION['carrinho'];
		}


		public static function getTotalItemsCarrinho(){
			if(isset($_SESSION['carrinho'])){
			$amount = 0;
			foreach ($_SESSION['carrinho'] as $key => $value) {
				$amount+=$value;
			}
			}else{
				return 0;
			}
			return $amount;
		}

		public static function getTotalPedido(){
            $valor = 0;
            foreach ($_SESSION['carrinho'] as $key => $value) {
                $valor+=$value;
            }
    
            return $valor;
        }


		
	}

?>