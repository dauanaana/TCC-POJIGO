<?php
require_once '../classes/Autoload.class.php';

$login = New Login;

if (isset($_POST['btnLogar'])){
    $login->setUser($_POST['inputUser']);
    $login->setSenha($_POST['inputSenha']);
    $login->Logar();

} else if (isset($_POST['logout'])){
    $login->Logout();
}