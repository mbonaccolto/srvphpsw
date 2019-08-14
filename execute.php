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

$answers = array(
  "Per quanto posso vedere, sì",
  "È certo",
  "È decisamente così",
  "Molto probabilmente",
  "Le prospettive sono buone",
  "I segni indicano di sì",
  "Senza alcun dubbio",
  "Sì",
  "Sì",
  "Ci puoi contare",
  "È difficile rispondere, prova di nuovo",
  "Rifai la domanda più tardi",
  "Meglio non risponderti adesso",
  "Non posso predirlo ora",
  "Concentrati e rifai la domanda",
  "Non ci contare",
  "La mia risposta è no",
  "Le mie fonti dicono di no",
  "Le prospettive non sono buone",
  "Molto incerto"
);

$answer = '';

if (!$text) {
  // Verificare che l'ultimo carattere sia un punto di domanda
    if ($text[sizeof($text) - 1] == '?') {
    // Da qui mandi la risposta
    $answer = $answers[rand(0, sizeof($answers)-1)];
    } 
    else {
      // Da qui gli mandi "ehy fammi una domanda"
      $answer = "Per poterti rispondere, mi devi fare una domanda...";
    }
}

header("Content-Type: application/json");
$parameters = array('chat_id' => $chatId, "text" => $text);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
