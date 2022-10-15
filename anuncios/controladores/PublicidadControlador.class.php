<?php
	header("Access-Control-Allow-Origin:*");
	require "../utils/autoload.php";

	class PublicidadControlador {
		public static function EnviarPublicidad($context){
			$p = new BannersModelo();
            $banners = $p -> ObtenerTodos();
            $rutas = [];
            foreach($banners as $anuncio){
            	if ($anuncio -> publicado === "1"){
	                $t = [
	                    'src' => $anuncio -> src
	                ];
                	array_push($rutas,$t);
                }
            }
            //$numeroRandom = random_int(0, count($rutas)-1);
    		//$anuncioAleatorio = $rutas[$numeroRandom];
    		$data = json_encode($rutas);
    		echo $data;
    		return;
		} 
	}


		