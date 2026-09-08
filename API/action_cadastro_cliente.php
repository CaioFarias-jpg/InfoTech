<?php
header('Content-Type: application/json');
$resposta = true;
$array = [];

if($resposta) {
        $array = [
            "status" => 200,
            "msg" => "Ação realizada com sucesso!!!!"
        ];

}
else{
    $array = [
        "status" => 400,
        "msg" => "Ocorreu um erro ao tentar realizar a sua solicitação"
    ];
}

// $array = [
//     "status" => 200,
//     "msg" => "Ação realizada com sucesso"
// ];

echo json_encode($array);