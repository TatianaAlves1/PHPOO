<?php

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/src/Extrator.php';
use \GuzzleHttp\Client;
use Tati\Comp\Extartor;

$client = new Client(['base_uri'=>'http://economia.awesomeapi.com.br']);
$buscador = new Extrator($client);
$valores = $buscador->buscarTudo('/json/last/USD-BRL,EUR-BRL,BTC-BRL');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Conversor</title>
</head>
 <table class="table w-50">
    <tr>
        <td>Moeda</td>
        <td>Valor atual</td>
    </tr>
    <?php
        foreach($valores as $moeda =>$valorAtual){?>
            <tr>
                <td><?=$moeda?></td>
                <td><?=$valorAtual?></td>
            </tr>
       <?php }  ?>
 </table>
<body>
    <form action="" method="get" id="form-conversor" class="container w-50">
       <div class="row">
        <div class="col-4">
                <label class="form-label d-block" for="">Informe o valor:</label>
                <input class="form-control" type="text" name="valor" id="valor" required>
                </div>
            <div class="col-4">
                <label class="form-label d-block" for="">Escolha a moeda:</label>
                <select name="moeda" id="moeda" class="form-select">
                    <option value="USDBRL" selected>Dólar</option>
                    <option value="EURBRL">Euro</option>
                    <option value="BTCBRL">BitCoin</option>
                </select>
            </div>
            <div class="col-4 d-flex align-items-end">
                <input type="submit" class="btn btn-dark" value="Consultar">
            </div>
       </div>
</form>
</body>
<?php
    if(isset($_GET) and !empty($_GET) and is_numeric($_GET['valor']) ){
        $url = '/json/last/USD-BRL,EUR-BRL,BTC-BRL';
       $resultado = $buscador->converterValor($_GET['valor'],$url,$_GET['moeda']);
       echo $resultado;
    }


    


?>
</html>