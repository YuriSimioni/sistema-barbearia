<?php

require_once "../config/config.php";

$BancoDeDados = new BancoDeDados;



class FuncoesGlobais {

    public function LogoutAll() {
        session_destroy();
    }
    
}

class Usuarios {
    
    public function LoginUsuario($login, $senha) {
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM usuario WHERE login = :l and senha = :s");
        $newPassword = hash("sha256", $senha);
        $sql->bindValue(":l", $login);
        $sql->bindValue(":s", $newPassword);
        $sql->execute();
        if($sql->rowCount() > 0) {
            $dadosFuncionario = $sql->fetch();
            $_SESSION['usuario'] = $dadosFuncionario;
            return true;
        } else {
            return false;
        }
    }

}