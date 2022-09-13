<?php 
    require $_SERVER['DOCUMENT_ROOT'] ."/utils/autoload.php";
    header("Content-Type:application/json");

    $data = json_decode(file_get_contents('php://input'), true);
    var_dump($data);
    AnunciosControlador::Eliminar($data['id']);
    var_dump(AnunciosControlador::Eliminar($data['id']));
    if(AnunciosControlador::Eliminar($data['id'])) {
        $data = boolval(true);
    }else $data = boolval(false);
    
    echo json_encode($data);
