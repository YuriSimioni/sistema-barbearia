<?php

require_once "../functions/functions.php";

if(isset($_SESSION['usuario'])) {
    header("Location: dashboard.php");
}

$BancoDeDados = new BancoDeDados();
$Usuarios = new Usuarios();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/login.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>
<body>

    <?php

if($_SERVER['REQUEST_METHOD'] == "POST") {
    if($BancoDeDados->Conectar()) {
        if($Usuarios->LoginUsuario($_POST['cpf'], $_POST['senha'])) {
            header("Location: dashboard.php");
        } else {
            if(isset($_SESSION['error'])) {
                ?>
                    
                    <div class="errorMsg">
                        <p><?php echo $_SESSION['error']?></p>
                    </div>
            
                <?php
            }
            
        }
    }
    
}
    
    

    ?>

    <form action="" method="post">
        
        <img src="../assets/imgs/logo.png" class="img" alt="">
        <div class="inputs">
            <div class="input">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Z"/></svg>
                <input type="text" id="login" name="cpf" class="real-input" required placeholder="CPF">
            </div>
            <div class="input">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm240-200q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80Z"/></svg>
                <input type="password" name="senha" class="real-input" required placeholder="Senha">
            </div>
        </div>
        <input type="submit" value="Entrar" class="btn">
    </form>

    <script>
        $('#login').mask('000.000.000-00', {
            onKeyPress : function(cpfcnpj, e, field, options) {
                const masks = ['000.000.000-000'];
                $('#login').mask(mask, options);
            }
        });
    </script>

    <?php

    
    ?>
</body>
</html>