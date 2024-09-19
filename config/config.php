<?php

date_default_timezone_set('America/Sao_Paulo');

session_start();

class BancoDeDados {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $bd = "barbearia";
    
    private $pdo;
    public $msgErro = "";
    
    public function Conectar() {

        global $pdo;
        global $msgErro;
        
        try {
        
            $pdo = new PDO("mysql:dbname=".$this->bd.";host=".$this->host, $this->user, $this->pass);
            return true;
        
        } catch (PDOException $e) {
        
            $msgErro = $e->getMessage();
            return false;
        
        }
    }
}

class Projeto {

    private $nomeProjeto = "Classic Barber";
    
    function getNomeProjeto() {
        return $this->nomeProjeto;
    }

}


$Projeto = new Projeto();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/ico/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/global.css">

    <title><?php echo $Projeto->getNomeProjeto();?></title>
    

</head>
<body>
    
</body>
</html>