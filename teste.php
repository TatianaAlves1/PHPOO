<?php
    require 'src/Usuario.php';


    $con = new PDO("mysql:host=localhost;dbname=artigos",'root', '');
    $sql = "SELECT * FROM usuarios";
    $status = $con->prepare($sql);
    if($status->execute()){
        $dados = $status->fetchAll(PDO::FETCH_ASSOC);
        $resultado = array_map(function($user){
            return new Usuario(
                $user["idusuario"],  
                $user["nome"],      
                $user["img"],
                $user["email"],
                $user["tipoUser"],
                $user["senha"],
                $user["dataCad"],
               
              );
        },$dados);

    }else{
        echo "Deu ruim";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Teste OO</title>
</head>
<body>
        <table class="table table-striped">
            <tr>
                <td>ID</td>
                <td>NOME</td>
                <td>E-mail</td>
                <td>IMG</td>
                <td>Tipo</td>
                <td>Senha</td>
                <td>Data Cadastro</td>
            </tr>
            <?php 
                foreach($resultado as $dados):
            ?>
            <tr>
                <td><?= $dados->getIdusuario() ?></td>
                <td><?= $dados->getNome() ?></td>
                <td><?= $dados->getEmail() ?></td>
                <td><?= $dados->getImg() ?></td>
                <td><?= $dados->getTipoUser() ?></td>
                <td><?= $dados->getSenha() ?></td>
                <td><?= $dados->getDataCad() ?></td>
            </tr>
            <?php endforeach ?>
        </table>
</body>
</html>
