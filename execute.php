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

//---- Sezione sessualità ----//
if ($text == '/sessualita') {
  header("Content-Type: application/json");
  $answer = "Scegli un argomento specifico tra quelli proposti:
  /preservativo_rotto - Si è rotto il preservativo?
  /no_preservativo - Non ho usato il preservativo
  /approfondimento - Vorresti approfondire la tematica?";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/preservativo_rotto') {
  header("Content-Type: application/json");
  $answer = "Sei interessato ad avere informazioni sulla contraccezione d’emergenza o sulle infezioni sessualmente trasmesse?
  /gravidanza_indesiderata
  /ist – infezioni sessualmente trasmesse";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/gravidanza_indesiderata') {
  header("Content-Type: application/json");
  $answer = "Si è rotto o non hai usato il preservativo?
Dato che volevi usare il preservativo o sei preoccupato/a di non averlo usato vuol dire che non è tua intenzione affrontare una gravidanza. A questo punto è opportuno ricorrere alla contraccezione d’emergenza. Sei maggiorenne o minorenne?
/Maggiorenne
/Minorenne

Vuoi informazioni sulla contraccezione per non correre il rischio di una gravidanza indesiderata quando avrai altri rapporti sessuali con il tuo partner? 
/contraccezione – si mi interessa";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/maggiorenne') {
  header("Content-Type: application/json");
  $answer = "In questo caso puoi andare direttamente in farmacia e acquistare la pillola del giorno dopo.
Puoi anche rivolgerti al consultorio della tua zona. 
/consultori - Vuoi vedere un elenco dei consultori? 
/cpc - Vuoi ulteriori informazioni sulla contraccezione d’emergenza?";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/minorenne') {
  header("Content-Type: application/json");
  $answer = "In questo caso puoi rivolgerti al consultorio o al tuo medico di famiglia per farti prescrivere la pillola del giorno dopo. Ti invitiamo inoltre a rivolgerti al consultorio della tua zona per adottare un programma contraccettivo più sicuro. 
/consultori - Vuoi vedere un elenco dei consultori? 
/cpc - Vuoi ulteriori informazioni sulla contraccezione d’emergenza?";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/consultori') {
  header("Content-Type: application/json");
  $answer = "Scarica il file:
  https://www.regione.lombardia.it/wps/wcm/connect/f5e7b712-254f-4095-a30d-d895fa020b74/CF+PER+SITO+3_06_19.xlsx";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/cpc') {
  header("Content-Type: application/json");
  $answer = "Contraccezione d’emergenza. Apri i seguenti link:
http://www.netyx.it/sesso/contraccettivi/cpc-o-pillola-del-giorno-dopo/
http://www.salute.gov.it/portale/donna/dettaglioContenutiDonna.jsp?lingua=italiano&id=956&area=Salute%20donna&menu=societa";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/no_preservativo') {
  header("Content-Type: application/json");
  $answer = "Scegli un comando:
  /gravidanza_indesiderata - se hai usato il preservativo e sei preoccupato/a per una gravidanza indesiderata
  /ist – se hai paura di un’infezione sessualmente trasmissibile";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/ist') {
  header("Content-Type: application/json");
  $answer = "Vuoi saperne di più sulle infezioni sessualmente trasmissibili?
http://www.netyx.it/sesso/malattie-a-trasmissione-sessuale-2/

Sei preoccupato e vuoi eseguire un test?
https://www.ats-milano.it/portale/Ats/Carta-dei-Servizi/Guida-ai-servizi/HIV-AIDS-Malattie-A-Trasmissione-Sessuale
http://www.smartsex.eu/

Per rimanere sempre aggiornato/a scarica l’app:
Android:  https://play.google.com/store/apps/details?id=com.softplace.smartaids
iOS: https://apps.apple.com/it/app/smart-sex/id878193172";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/contraccezione') {
  header("Content-Type: application/json");
  $answer = "Ecco un link con le principali modalità di contraccezione che potrai valutare insieme al tuo ginecologo
  http://www.netyx.it/sesso/contraccettivi/";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}


//---- fine sezione sessualità ----//



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




if ($text == '/foodgame') {
  header("Content-Type: application/json");
  $answer = "per questa tematica dovresti contattare @FoodGame_BOT";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/materialedidattico') {
  header("Content-Type: application/json");
  $answer = "Scegli il materiale (vanno comunque visti tutti): 
  /alimentazionesostenibile
  /attivitafisica
  /impariamoascegliere";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters); 
} 

if ($text == '/alimentazionesostenibile') {
  $answer = "per questa tematica dovresti contattare @FoodGame_BOT";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters); 
}

if ($text == '/attivitafisica') {
  header("Content-Type: application/json");
  $answer = "Attività fisica:
  https://www.ats-milano.it/Portale/Portals/0/AtsMilano_Documenti/All%20Attivita%20fisica%20dico%20SI_a96a5ba0-416c-46b9-90b2-24e4d4cb0b37.pdf";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters); 
}


if ($text == '/impariamoascegliere') {
  header("Content-Type: application/json");
  $answer = "per questa tematica dovresti contattare @FoodGame_BOT";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters); 
}

if ($text == '/atsmilano') {
  header("Content-Type: application/json");
  $answer = "ATS Milano Città Metropolitana
  https://www.ats-milano.it/Portale/Portals/_default/Skins/Rubrik-bs//images/LogoAtsMilano.gif";
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

