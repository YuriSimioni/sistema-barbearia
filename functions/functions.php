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
        $sql = $pdo->prepare("SELECT * FROM usuario WHERE cpf = :c and senha = :s");
        $newPassword = hash("sha256", $senha);
        
        $sql->bindValue(":c", $login);
        $sql->bindValue(":s", $newPassword);
        $sql->execute();
        if($sql->rowCount() > 0) {
            $dadosFuncionario = $sql->fetch();
            $_SESSION['usuario'] = $dadosFuncionario;
            $_SESSION['error'] = false;
            return true;
        } else {
            $_SESSION['error'] = "Usuário ou senha incorretos!";
            return false;
        }
    }

}