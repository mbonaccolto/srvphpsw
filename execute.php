<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

if(!$update)
{
  exit;
}

$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";

$text = trim($text);
$text = strtolower($text);

if ($text == '/covid') {
  header("Content-Type: application/json");
  $answer = "Scegli un argomento specifico tra quelli proposti:
/lavoratore_fragile - info per i lavoratori
/alunni_fragili - info per gli alunni
/sintomi_sospetti - sintomi generali 
/sintomi_sospetti_scuola - sintomi a scuola
/sintomi_sospetti_casa - sintomi a casa
/alunno_in_attesa_esito_tampone - se l'alunno ha già fatto il tampone
/isolamento - info sull'isolamento obbligatorio/fiduciario
/accesso_ai_punti_tampone - punti tampone
/alunni_operatori_positivi - se positivi
/alunni_operatori_negativi - se negativi
/contatto_stretto - cosa fare se si è contatto stretto
/problema_salute_no_Covid 
/compagni_classe_alunno_ positivo
/numero_elevato_di_assenze
/referente_covid
/a_chi_rivolgersi
/informazioni_ corrette";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

  
header("Content-Type: application/json");
$parameters = array('chat_id' => $chatId, "text" => "Se non utilizzi i comandi mi limito a ripetere ciò che mi hai scritto: ".$text);
// $parameters = array('chat_id' => $chatId, "text" => $answer);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
