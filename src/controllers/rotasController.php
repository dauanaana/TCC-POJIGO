<?php
    require_once '../classes/Autoload.class.php';
    $conn = New Site;

    $origem = $_POST['origem'];
    $destino = $_POST['destino'];

    if (isset($_POST['salvar'])) {
        $sql = "INSERT INTO rotas (`nome_rota`, `fk_cidade_origem`, `fk_cidade_destino`) VALUES ('{$origem} X {$destino}', '{$origem}', '{$destino}')";
        $conn->executeQuery($sql);
    }
?>