<?php
namespace Tati\Comp\Extartor;
use GuzzleHttp\ClientInterface;

class Extrator{
    private $httpClient;
    public function __construct(ClientInterface $httpClient){
        $this->httpClient = $httpClient;
    }

    public function buscarTudo(string $url):array{
        $response = $this->httpClient->request('GET', $url);
        $dados =  json_decode($response->getBody(),true); 
        $valores = [];       
        foreach($dados as $item){
            $valores[$item['name']] = "R$ ".number_format($item['bid'],2,',','.');
        }
        return $valores;
    }   

    public function exibirCotacaoMoeda(string $url,string $moeda):float{
        $response = $this->httpClient->request('GET', $url);
        $dados =  json_decode($response->getBody(),true); 
        $valor = $dados[$moeda]["bid"];
        return $valor;
    }

    public function converterValor(float $valor,string $url,string $moeda):string{
        $cotacao = $this->exibirCotacaoMoeda($url,$moeda); 
        $resultado = $valor/$cotacao;
        return "R$ ".number_format($resultado,2,',','.');
    }

    
}