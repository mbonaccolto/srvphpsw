<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

if(!$update)
{
  exit;
}

if (($update['message']) != null) {
  /*
  if(!$update)
  {
    exit;
  }
  */


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

  if ($text == "/ver") {
    header("Content-Type: application/json");
    $answer =  "versione 17:54";
    $parameters = array('chat_id' => $chatId, "text" => $answer);
    $parameters["method"] = "sendMessage";
    echo json_encode($parameters);
  }

  ##################
  # tastiera inline
  ##################
  if ($text == '/keyboard') {
    header("Content-Type: application/json");
    // la mia risposta è un array JSON composto da chat_id, text, method
    // chat_id mi consente di rispondere allo specifico utente che ha scritto al bot
    // text è il testo della risposta
    $parameters = array('chat_id' => $chatId, "text" => $text);
    // method è il metodo per l'invio di un messaggio (cfr. API di Telegram)
    $parameters["method"] = "sendMessage";
    // imposto la inline keyboard
    $keyboard = ['inline_keyboard' => [[['text' =>  'Pulsante 1', 'callback_data' => 'comando 1'], 
                                        ['text' =>  'Pulsante 2', 'callback_data' => 'comando 2'],
                                        ['text' =>  'Pulsante 3', 'callback_data' => 'comando 3'],
                                        ['text' =>  'Pulsante 4', 'callback_data' => 'comando 4']]]];
  
  #  $parameters["reply_markup"] = json_encode($keyboard, true); // orig 
     $parameters["force_reply"] = json_encode($keyboard, true);

    // converto e stampo l'array JSON sulla response
    echo json_encode($parameters);
  }
  
  // tastiera normale (no inline)
 if ($text == '/keyboard1') {
   header("Content-Type: application/json");
  // la mia risposta è un array JSON composto da chat_id, text, method
  // chat_id mi consente di rispondere allo specifico utente che ha scritto al bot
  // text è il testo della risposta
  $parameters = array('chat_id' => $chatId, "text" => $text);
  // method è il metodo per l'invio di un messaggio (cfr. API di Telegram)
  $parameters["method"] = "sendMessage";
  // imposto la keyboard
  $parameters["reply_markup"] = '{ "keyboard": [["uno"], ["due"], ["tre"], ["quattro"]], "one_time_keyboard": false}';
  // converto e stampo l'array JSON sulla response
  echo json_encode($parameters);
 }

  #####################
  # fine tastiera
  #####################

  if ($text == '/bullismo') {
    header("Content-Type: application/json");
    $answer = "per questa tematica dovresti contattare @EducaPari_bot";
    $parameters = array('chat_id' => $chatId, "text" => $answer);
    $parameters["method"] = "sendMessage";
    echo json_encode($parameters);
  }

  if ($text == '/start') {
    header("Content-Type: application/json");
    $answer = "Ciao, puoi iniziare a interagire con me digitando un comando con il carattere /. Oppure clicca sulla: /listacomandi";
    $parameters = array('chat_id' => $chatId, "text" => $answer);
    $parameters["method"] = "sendMessage";
    echo json_encode($parameters);
  }

  if ($text == '/listacomandi') { //01
    header("Content-Type: application/json");
    $answer = "/foodgame - Intro sul gioco
    /presentazione - presentazione gioco
    /materialedidattico - scarica il materiale didattico
    /tappa_1 - 1° tappa
    /opuscolo - opuscolo 2019
    /report - report delle tappe
    ";
    $parameters = array('chat_id' => $chatId, "text" => $answer);
    $parameters["method"] = "sendMessage";
    echo json_encode($parameters);
  }

  if ($text == '/foodgame') { //02
    header("Content-Type: application/json");
    $answer = "FoodGame ATS Milano Città Metropolitana: guarda i video fatti dai foodgamer!
    /kungfoodpanda - Video di una squadra - Ist. Pareto di Milano
    /exfoodgamer - Intervista ad un ex foodgamer dell'Ist. Torricelli di Milano
    /cucinare_salutare - video fatto all'ITIS - Liceo Mattei di S. Donato Milanese
    /justdance - video fatto all'ITIS - Liceo Mattei di S. Donato Milanese
    /colorfuls - presentazione squadra, ITIS - Liceo Mattei di S. Donato Milanese";
    $parameters = array('chat_id' => $chatId, "text" => $answer);
    $parameters["method"] = "sendMessage";
    echo json_encode($parameters);
  }

  if ($text == '/materialedidattico') { //03
    header("Content-Type: application/json");
    $answer = "Clicca su un comando per scaricare il materiale didattico desiderato:
    /alimentazione_sostenibile
    /scegliere_a_tavola
    /attivita_fisica
    /carta_di_milano";
    $parameters = array('chat_id' => $chatId, "text" => $answer);
    $parameters["method"] = "sendMessage";
    echo json_encode($parameters);
  }

  if ($text == '/presentazione') { //04
    header("Content-Type: application/json");
    $answer = "Scegli il file desiderato:
    /pf - Presentazione FoodGame
    /bc - Evoluzione componente digitale";
    $parameters = array('chat_id' => $chatId, "text" => $answer);
    $parameters["method"] = "sendMessage";
    echo json_encode($parameters);
  }

  if ($text == '/pf') { //05
    header("Content-Type: application/json");
    $answer = "Presentazione FoodGame:
    https://socialmi.ats-milano.it/165/social/wiki/UcSmMJHujJRA4h_11112019_PAOLAFISCHERpresentazionefoodgame.pdf";
    $parameters = array('chat_id' => $chatId, "text" => $answer);
    $parameters["method"] = "sendMessage";
    echo json_encode($parameters);
  }

  if ($text == '/bc') { //06
    header("Content-Type: application/json");
    $answer = "Evoluzione componente digitale: 
    https://socialmi.ats-milano.it/165/social/wiki/Ucfy6YBOYzz58O_11112019_BENEDETTACHIAVEGATTIEvoluzionedellacomponentedigitale.pdf";
    $parameters = array('chat_id' => $chatId, "text" => $answer);
    $parameters["method"] = "sendMessage";
    echo json_encode($parameters);
  }

  // sottocomandi /materialedidattico

  if ($text == '/alimentazione_sostenibile') { //07
    header("Content-Type: application/json");
    $answer = "Alimentazione sostenibile:
    https://www.ats-milano.it/Portale/Portals/0/AtsMilano_Documenti/Alimentazione%20sostenibile_67dc0fa3-8911-43d3-8030-198eb56fef48.pdf";
    $parameters = array('chat_id' => $chatId, "text" => $answer);
    $parameters["method"] = "sendMessage";
    echo json_encode($parameters);
  }

  if ($text == '/scegliere_a_tavola') { //08
    header("Content-Type: application/json");
    $answer = "FoodGame: impariamo a scegliere anche a tavola...
    https://www.ats-milano.it/Portale/Portals/0/AtsMilano_Documenti/2018%20impariamo%20a%20scegliere...%20anche%20a%20tavola!-1_1ffa7046-61b8-442f-848f-6dc1c022159b.pdf";
    $parameters = array('chat_id' => $chatId, "text" => $answer);
    $parameters["method"] = "sendMessage";
    echo json_encode($parameters);
  }

  if ($text == '/attivita_fisica') { //09
    header("Content-Type: application/json");
    $answer = "L'importanza dell'attività fisica:
    https://www.ats-milano.it/Portale/Portals/0/AtsMilano_Documenti/All%20Attivita%20fisica%20dico%20SI_a96a5ba0-416c-46b9-90b2-24e4d4cb0b37.pdf";
    $parameters = array('chat_id' => $chatId, "text" => $answer);
    $parameters["method"] = "sendMessage";
    echo json_encode($parameters);
  }

  if ($text == '/carta_di_milano') { //10
    header("Content-Type: application/json");
    $answer = "La Carta di Milano (non è una mappa!):
    https://www.ats-milano.it/Portale/Portals/0/AtsMilano_Documenti/Carta%20di%20MIlano_696adf84-ff83-4400-a324-1c3124d5674a.pdf";
    $parameters = array('chat_id' => $chatId, "text" => $answer);
    $parameters["method"] = "sendMessage";
    echo json_encode($parameters);
  }

  // fine sottocomando /materialedidattico

  if ($text == '/tappa_1') { //11
    header("Content-Type: application/json");
    $answer = "Completa la 1° tappa, fai il test di squadra!
    https://www.ats-milano.it/Portale/Portals/0/AtsMilano_Documenti/tappa%201TEST%20SQUADRA_a8160673-1c46-4a08-a07c-441d727b1d9b.doc";
    $parameters = array('chat_id' => $chatId, "text" => $answer);
    $parameters["method"] = "sendMessage";
    echo json_encode($parameters);
  }

  if ($text == '/opuscolo') {
    header("Content-Type: application/json");
    $answer = "Opuscolo FoodGame 2019:
    https://www.ats-milano.it/Portale/Portals/0/AtsMilano_Documenti/FoodGame%202019%20Opuscolo_rev_1_0_2a404161-b9db-48b0-888a-c8632e30dcaf.pdf";
    $parameters = array('chat_id' => $chatId, "text" => $answer);
    $parameters["method"] = "sendMessage";
    echo json_encode($parameters);
  }

  if ($text == '/report') {
    header("Content-Type: application/json");
    $answer = "Report delle tappe del Food Game:
    https://www.ats-milano.it/Portale/Portals/0/AtsMilano_Documenti/REPORT%20TAPPE%20FG_6f34c716-3cb0-47dd-8b5a-d55c5022b580.doc";
    $parameters = array('chat_id' => $chatId, "text" => $answer);
    $parameters["method"] = "sendMessage";
    echo json_encode($parameters);
  }

  // video youtube

  if ($text == '/exfoodgamer') {
    header("Content-Type: application/json");
    $answer = "https://youtu.be/KDAGmy2VUlU";
    $parameters = array('chat_id' => $chatId, "text" => $answer);
    $parameters["method"] = "sendMessage";
    echo json_encode($parameters);
  }

  if ($text == '/cucinare_salutare') {
    header("Content-Type: application/json");
    $answer = "https://youtu.be/aYRMwoSmWJA";
    $parameters = array('chat_id' => $chatId, "text" => $answer);
    $parameters["method"] = "sendMessage";
    echo json_encode($parameters);
  }


  if ($text == '/justdance') {
    header("Content-Type: application/json");
    $answer = "https://youtu.be/CI9tXsZKa_U";
    $parameters = array('chat_id' => $chatId, "text" => $answer);
    $parameters["method"] = "sendMessage";
    echo json_encode($parameters);
  }


  if ($text == '/colorfuls') {
    header("Content-Type: application/json");
    $answer = "https://youtu.be/Loxx3gzFtik";
    $parameters = array('chat_id' => $chatId, "text" => $answer);
    $parameters["method"] = "sendMessage";
    echo json_encode($parameters);
  }

  if ($text == '/kungfoodpanda') {
    header("Content-Type: application/json");
    $answer = "https://youtu.be/mvVW6LW4SEQ";
    $parameters = array('chat_id' => $chatId, "text" => $answer);
    $parameters["method"] = "sendMessage";
    echo json_encode($parameters);
  }

  // fine video

  // fine comandi
  header("Content-Type: application/json");
  $parameters = array('chat_id' => $chatId, "text" => "Se non utilizzi i comandi mi limito a ripetere ciò che mi hai scritto: ".$text);
  // $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

else if ($update["callback_data"] != Null) {
    header("Content-Type: application/json");
    $answer =  "Hai premuto il pulsante $callback";
    $parameters = array('chat_id' => $chatId, "text" => $answer);
    $parameters["method"] = "sendMessage";
    echo json_encode($parameters);
}


