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

    public function numeroUsuariosCad() {
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM usuario");
        $sql->execute();
        $count = 0;
        if($sql->rowCount() >= 0) {
            $user = $sql->fetchAll();
            foreach($user as $s) {
                $count++;
            }
            echo $count;
            ?><?php
        }
    }
    public function numeroFuncionariosCad() {
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM funcionarios");
        $sql->execute();
        $count = 0;
        if($sql->rowCount() >= 0) {
            $user = $sql->fetchAll();
            foreach($user as $s) {
                $count++;
            }
            echo $count;
            ?><?php
        }
    }
    public function numeroClientesCad() {
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM clientes");
        $sql->execute();
        $count = 0;
        if($sql->rowCount() >= 0) {
            $user = $sql->fetchAll();
            foreach($user as $s) {
                $count++;
            }
            echo $count;
            ?><?php
        }
    }
    public function numeroFornecedoresCad() {
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM fornecedores");
        $sql->execute();
        $count = 0;
        if($sql->rowCount() >= 0) {
            $user = $sql->fetchAll();
            foreach($user as $s) {
                $count++;
            }
            echo $count;
            ?><?php
        }
    }

}