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

if ($text == '/bullismo') {
  header("Content-Type: application/json");
  $answer = "Dovrei dare delle info sul bullismo... Per adesso Maurizio mi ha programmato con questa frase inutile :(";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/relazioni') {
  header("Content-Type: application/json");
  $answer = "Dovrei dare delle info sulle relazioni... Anche qua Maurizio mi ha programmato con una risposta inutile. Mi spiace...";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/sessualita') {
  header("Content-Type: application/json");
  $answer = "Dovrei dare delle info sulla sessualità... ma non sono ancora pronto! :)";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/sostanze') {
  header("Content-Type: application/json");
  $answer = "Ci sono un sacco di leggi contro l'abuso di sostanze :)";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/contraccezione') {
  header("Content-Type: application/json");
  $answer = "Attenti alle malattie /ist e alle gravidanze indesiderate!";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}


if ($text == '/ist') {
  header("Content-Type: application/json");
  $answer = "Qua parliamo di infezioni sessualmente trasmissibili. E per ora non ne so abbastanza...";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/foodgame') {
  header("Content-Type: application/json");
  $answer = "https://www.youtube.com/watch?v=VTXsXvpNGe0";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/materialedidattico') {
  header("Content-Type: application/json");
  $answer = "Ecco un po' di file...
  https://www.ats-milano.it/Portale/Portals/0/AtsMilano_Documenti/Alimentazione%20sostenibile_67dc0fa3-8911-43d3-8030-198eb56fef48.pdf";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
  
  $answer ="https://www.ats-milano.it/Portale/Portals/0/AtsMilano_Documenti/Carta%20di%20MIlano_696adf84-ff83-4400-a324-1c3124d5674a.pdf";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
  
  $answer ="https://www.ats-milano.it/Portale/Portals/0/AtsMilano_Documenti/All%20Attivita%20fisica%20dico%20SI_a96a5ba0-416c-46b9-90b2-24e4d4cb0b37.pdf";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
  
}

if ($text == '/start') {
  header("Content-Type: application/json");
  $answer = "EducaPari BOT è un roBOT di ATS Milano che risponde a domande, dubbi e perplessità degli educatori tra pari.";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}
  
header("Content-Type: application/json");
$parameters = array('chat_id' => $chatId, "text" => "Se non utilizzi i comandi mi limito a ripetere ciò che mi hai scritto: ".$text);
// $parameters = array('chat_id' => $chatId, "text" => $answer);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
