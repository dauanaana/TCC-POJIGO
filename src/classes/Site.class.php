<?php

/**
 * CLASSE "Site"
 * Classe principal do projeto.
 *
 */

class Site
{

    private $host = "pojigo.tk:3306";
    private $user = "pojigo";
    private $password = "entra21@Blusoft";
    private $database = "pojigo_master";
//
//        private $host="localhost";
//        private $user="root";
//        private $password="";
//        private $database="controlerotas";

    public $query;
    private $conn;
    public $result;

    /**
     * SITE CONSTRUCT
     * Executa o autoload, inclui as configurações,
     * funções e cria a conexão inicial.
     */

    /**
     * @return mixed
     */
    public function getConn()
    {
        return $this->conn;
    }

    public function __construct()
    {

        if (!isset($_SESSION)) {
            session_start();
        }

        // Iniciando a Conexão
        $this->connect();


        // Includes de configurações e funções globais do projeto
//			require_once("../../include/config.php");
//            require_once("../../include/functions.php");
    }


    /* Função de Conexão com o Banco */
    public function connect()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if (!$this->conn) {
            echo "Falha na conexão com o Banco de Dados!<br>";
            echo "Erro: " . mysqli_connect_error();
            die();
        }
    }

    //Executa uma query no banco de dados
    public function executeQuery($query)
    {
        $this->connect();
        $this->query = $query;
        if ($this->result = mysqli_query($this->conn, $this->query)) {
            return $this->result;
        } else {
            echo "Ocorreu um erro na execução da SQL";
            echo "Erro :" . mysqli_error($this->conn);
            echo "SQL: " . $query;
            die();
        }
    }


    /**
     * Função disconnect - Fecha a conexão com o BD
     *
     */

    public function disconnect()
    {
        return mysqli_close($this->conn);
    }

    /**
     * SITE DESTRUCT
     *
     */
    public function __destruct()
    {

    }

}


// // Exemplo de busca no banco:
// // Cria a conexão:
// $conn = new Site;
//
// // Executa a Query no banco:
// $selectUsers = $conn->executeQuery("SELECT * FROM usuario");
//
// // Retorna o número de linhas em um resultado anterior (@$selectUsers):
// $selectUsersRows = mysqli_num_rows($selectUsers);
//
// // Exibe todos os registros na tela:
// while ($selectUsersRows = mysqli_fetch_assoc($selectUsers)){
//     echo $selectUsersRows["usuario"]."<br>";
// }

?>
