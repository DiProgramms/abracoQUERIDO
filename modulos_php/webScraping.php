<?php
//Inclusão de blibioteca Simple HTML DOM Parser
include ('../abracoQuerido/modulos_php/simple_html_dom.php');

//URL do site em questão
$url = "URL_DO_SITE";

//Solicitação HTTP para a página usando o cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$html = curl_exec($ch);
curl_close($ch);

//Criação objeto DOM do HTML
$dom = new simple_html_dom();
$dom->load($html);

//Encontrar elemento HTML que contém a mensagem específica
$mensagem = $dom->find('.', 0)->plaintext;

//Exibe mensagem
echo $mensagem;

//Liberação de memória
$dom->clear();
?>