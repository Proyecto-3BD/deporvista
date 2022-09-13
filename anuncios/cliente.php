<?php
    $url = "http://192.168.48.4/apiBanner.php";
    $estado = $_POST['estado'];
    $jsonPost = json_encode($_POST);
    $headers = array('Content-Type:application/json');

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_POST, true);
    //curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonPost);

    $data = curl_exec($curl);
    curl_close($curl);
    
    //$data = json_decode($data);

    $anuncios = json_decode($data, true);

    
    $rutas = [];
    foreach ($anuncios as $anuncio) {
        if($anuncio['estado']==="1"){
            array_push($rutas, $anuncio["ubicacion"]);
        }
    }
    //var_dump($rutas);
    $numeroRandom = random_int(0, count($rutas)-1);
    $anuncioAleatorio = $rutas[$numeroRandom];

    $data = json_encode($anuncioAleatorio);
    echo $data;
    
    