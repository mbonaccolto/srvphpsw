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
  $answer = "per questa tematica dovresti contattare @EducaPari_bot";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}


  
if ($text == '/foodgame') {
  header("Content-Type: application/json");
  $answer = "FoodGame ATS Milano Città Metropolitana:
  https://www.youtube.com/watch?v=sB_e7odulS0";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

header("Content-Type: application/json");
$parameters = array('chat_id' => $chatId, "text" => "Se non utilizzi i comandi mi limito a ripetere ciò che mi hai scritto: ".$text);
// $parameters = array('chat_id' => $chatId, "text" => $answer);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
