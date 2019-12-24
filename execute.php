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

//---- Sezione sessualità ----//
if ($text == '/sessualita') { //01
  header("Content-Type: application/json");
  $answer = "Scegli un argomento specifico tra quelli proposti:
  /preservativo_rotto - Si è rotto il preservativo?
  /no_preservativo - Non ho usato il preservativo
  /approfondimento - Vorresti approfondire la tematica?";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/preservativo_rotto') { //02
  header("Content-Type: application/json");
  $answer = "Sei interessato ad avere informazioni sulla contraccezione d’emergenza o sulle infezioni sessualmente trasmesse?
  /gravidanza_indesiderata
  /ist – infezioni sessualmente trasmesse";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/gravidanza_indesiderata') { //03
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

if ($text == '/maggiorenne') { //04
  header("Content-Type: application/json");
  $answer = "In questo caso puoi andare direttamente in farmacia e acquistare la pillola del giorno dopo.
Puoi anche rivolgerti al consultorio della tua zona. 
/consultori - Vuoi vedere un elenco dei consultori? 
/cpc - Vuoi ulteriori informazioni sulla contraccezione d’emergenza?";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/minorenne') { //05
  header("Content-Type: application/json");
  $answer = "In questo caso puoi rivolgerti al consultorio o al tuo medico di famiglia per farti prescrivere la pillola del giorno dopo. Ti invitiamo inoltre a rivolgerti al consultorio della tua zona per adottare un programma contraccettivo più sicuro. 
/consultori - Vuoi vedere un elenco dei consultori? 
/cpc - Vuoi ulteriori informazioni sulla contraccezione d’emergenza?";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/consultori') { //06
  header("Content-Type: application/json");
  $answer = "Scarica il file:
  https://www.regione.lombardia.it/wps/wcm/connect/f5e7b712-254f-4095-a30d-d895fa020b74/CF+PER+SITO+3_06_19.xlsx";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/cpc') { //07
  header("Content-Type: application/json");
  $answer = "Contraccezione d’emergenza. Apri i seguenti link:
http://www.netyx.it/sesso/contraccettivi/cpc-o-pillola-del-giorno-dopo/
http://www.salute.gov.it/portale/donna/dettaglioContenutiDonna.jsp?lingua=italiano&id=956&area=Salute%20donna&menu=societa";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/no_preservativo') { //08
  header("Content-Type: application/json");
  $answer = "Scegli un comando:
  /gravidanza_indesiderata - se non hai usato il preservativo e sei preoccupato/a per una gravidanza indesiderata
  /ist – se hai paura di un’infezione sessualmente trasmissibile";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/ist') { //09
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

if ($text == '/contraccezione') { //10
  header("Content-Type: application/json");
  $answer = "Ecco un link con le principali modalità di contraccezione che potrai valutare insieme al tuo ginecologo
  http://www.netyx.it/sesso/contraccettivi/";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/approfondimento') { //11
  header("Content-Type: application/json");
  $answer = "Quale di questa tematica vorresti approfondire?
  /definizione - Ti interessa sapere cos’è la sessualità?
  /relazioni – Hai una relazione o ne vorresti una e ti interessa approfondire il tema?
  /corpo – Come funzionano i miei organi sessuali? Perché il mio corpo è cambiato? Come faccio se non mi piace?
  /identitadigenere – cos’è l’identità di genere?
  /piacere – Considerando che la sessualità è un piacere, vuoi approfondire l’argomento?";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/definizione') { //12
  header("Content-Type: application/json");
  $answer = "Puoi trovare una difinizione a questo link:
  http://www.netyx.it/sesso/sessualita/
  Oppure scarica questo file:
  https://socialmi.ats-milano.it/165/social/wiki/heXhZa47tqBmF9_21112019_DEFINIZIONE.pdf";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/relazioni') { //13
  header("Content-Type: application/json");
  $answer = "/partner - Ti senti spaesato in questo oceano chiamato “relazioni con un partner” e vorresti qualche consiglio da un esperto?
  /orientamento – Vuoi sapere qualcosa in più sull’orientamento sessuale?
  /starbenesoli - Stai bene anche se non hai una relazione e ti domandi il perché?
  /amarebene – Cosa significa amare bene? Come riconoscere un amore violento?";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/partner') { //14
  header("Content-Type: application/json");
  $answer = "Prova a cliccare questo link:
  http://www.netyx.it/relazioni/sto-con-te-2/";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/orientamento') { //15
  header("Content-Type: application/json");
  $answer = "Prova a scaricare questo file:
  https://socialmi.ats-milano.it/165/social/wiki/p69mZJ2zqu9otl_21112019_genereorientamento.pdf";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/starbenesoli') { //16
  header("Content-Type: application/json");
  $answer = "Non preoccuparti, molto probabilmente hai imparato ad essere indipendente e hai capito che la relazione con il partner è qualcosa di bello, ma che non è obbligatorio.
  Se però provi fastidio quando ti relazioni con gli altri, o preferisci stare sempre da solo, prova a parlarne con qualcuno.";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/amarebene') { //17
  header("Content-Type: application/json");
  $answer = "Prova a dare un'occhiata a questi link:
  http://www.netyx.it/questo-e-amore/
	http://www.netyx.it/lamore-e-rispetto/";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/corpo') { //18
  header("Content-Type: application/json");
  $answer = "/nonmipiaccio - Non ti senti a tuo agio col tuo corpo e non ti piaci?
  /cambiamento - Il tuo corpo è cambiato negli ultimi anni? Vuoi capirci di più?";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/nonmipiaccio') { //19
  header("Content-Type: application/json");
  $answer = "Guarda questo link:
  http://www.netyx.it/mi-piaccio-io-e-il-mio-corpo/quando-non-mi-piaccio/
  Potrebbe piacerti anche questo:
  https://socialmi.ats-milano.it/165/social/wiki/p49tj14Cv6yueA_21112019_poesiacarloporta.pdf";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/cambiamento') { //20
  header("Content-Type: application/json");
  $answer = "/ragazza - se sei una ragazza
  /ragazzo - se sei un ragazzo";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/ragazza') { //21
  header("Content-Type: application/json");
  $answer = "http://www.netyx.it/wordpress/wp-content/uploads/2015/09/PUBERTA-FEMMINILE-Brochure.pdf";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/ragazzo') { //22
  header("Content-Type: application/json");
  $answer = "Scarica il file:
  http://www.netyx.it/wordpress/wp-content/uploads/2016/05/PUBERTA-MASCHILE-Brochure.pdf
  Oppure:
  http://www.netyx.it/andrologia/";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/identitadigenere') { //23
  header("Content-Type: application/json");
  $answer = "Scarica il file:
  https://socialmi.ats-milano.it/165/social/wiki/p69mZJ2zqu9otl_21112019_genereorientamento.pdf";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/piacere') { //24
  header("Content-Type: application/json");
  $answer = "Non ti dimenticare che la sessualità è anche divertimento e piacere. Se non ti diverti e non ti senti bene, forse hai una relazione poco adatta a te o non stai facendo la cosa giusta. Un buon metro di paragone può essere come ti senti la mattina appena sveglio/a dopo essere stato/a con lui/lei.
  /masturbazione – vuoi approfondire tale tema?
  /orgasmo – vuoi saperne di più?
  /desiderio – vuoi conoscere qualcosa in più rispetto al desiderio sessuale?
  /zoneerogene – quali? Come stimolarle?
  /comedarepiacere – come dare piacere agli organi sessuali?";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/masturbazione') { //25
  header("Content-Type: application/json");
  $answer = "Il piacere può derivare anche dalla masturbazione. Non sentirti in colpa, non c’è nulla di sbagliato, anche se spesso ci viene detto così. Trova un luogo privato e tranquillo e scopri il tuo corpo. Ti piacerà!";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/orgasmo') { //26
  header("Content-Type: application/json");
  $answer = "L’orgasmo è piacere allo stato puro. Ciò che si vive durante questo momento non è uguale per tutti, ma si riferisce ad una gamma di sensazioni, emozioni e risposte corporee variegate";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/desiderio') { //27
  header("Content-Type: application/json");
  $answer = "Il desiderio è la prima fase del ciclo di risposta sessuale. È il punto di partenza, è il motore che guida il nostro comportamento e la ricerca dell’altro. È reciproco ed è ciò che definisce quando una relazione sessuale è ricercata e voluta, e non imposta.
  ATTENZIONE perché a volte il desiderio non è reciproco, per questo è necessario che sia chiaro il CONSENSO. 
  Guarda questo video animato per capire di cosa si tratta: 
  https://www.youtube.com/watch?v=RhaZDVcGo-o";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/zoneerogene') { //28
  header("Content-Type: application/json");
  $answer = "Una zona erogena è una parte del nostro corpo che, se sottoposta a stimolazione, produce piacere. Queste zone non sono uguali per tutti. Per scoprire quali sono gioca insieme al tuo partner e scoprilo, oppure chiediglielo. Potreste scoprire insieme che baciarsi il lobo dell’orecchio o il collo può essere molto piacevole.";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/comedarepiacere') { //29
  header("Content-Type: application/json");
  $answer = "Probabilmente sei curioso di sapere come procurare piacere al tuo o alla tua partner o come procurartelo da solo/a. Posso aiutarti! Devi solo dirmi se vuoi saperne di più sul piacere maschile o sul piacere femminile:
  /piaceremaschile
  /piacerefemminile";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/piaceremaschile') { //30
  header("Content-Type: application/json");
  $answer = "Scarica il file:
  https://socialmi.ats-milano.it/165/social/wiki/C5BCxoXmoYVwis_21112019_comedarepiaceremaschile.pdf";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/piacerefemminile') { //31
  header("Content-Type: application/json");
  $answer = "Scarica il file:
  https://socialmi.ats-milano.it/165/social/wiki/ep2vQSije6abBk_21112019_comedarepiacerefemminile.pdf";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

//---- fine sezione sessualità ----//

//---- inizio sezione dipendenze ----//

if ($text == '/sostanze') { //40
  header("Content-Type: application/json");
  $answer = "Ciao, se hai cliccato qui, vuol dire che sei interessato ad approfondire questo tema. 
Vuoi dirmi cosa ti interessa di più?
/approfondimento_sostanze – Se vuoi saperne di più
/rischi – per conoscere i rischi legati alle sostanze, le leggi e leggere delle testimonianze
/sostanze_aiuto – ho bisogno di aiuto";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/approfondimento_sostanze') { //41
  header("Content-Type: application/json");
  $answer = "Scegli tra queste opzioni: 
/definizione_sostanze – se ti interessa la definizione di sostanze psicoattive
/usoabuso – uso, abuso o ne dipendo? 
/qualisono – se vuoi conoscere quali sono le sostanze";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/definizione_sostanze') { //42
  header("Content-Type: application/json");
  $answer = "Scarica questo file se vuoi conoscere la definizione di sostanze psicoattive:
https://socialmi.ats-milano.it/165/social/wiki/MYhriSoTZvZQ5q_06122019_definizionesostanzepsicoattive.pdf
E se ti va, guarda questo video:
https://socialmi.ats-milano.it/165/social/wiki/xW4SrbgPX3eAXc_29102019_Nuggets.mp4";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/usoabuso') { //43
  header("Content-Type: application/json");
  $answer = "Scarica questo file se vuoi sapere se stai solo usando, stai abusando o sei dipendente da una sostanza:
https://socialmi.ats-milano.it/165/social/wiki/3K03VzW32fhfdw_06122019_usoabusodipendenzatolleranzaastinenzaoverdose.pdf";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/qualisono') { //44
  header("Content-Type: application/json");
  $answer = "Ecco per te una lista e una descrizione delle sostanze psicoattive:
https://socialmi.ats-milano.it/165/social/wiki/WcQlsBlRGXee33_06122019_cerchiosostanzepsicoattive.pdf";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/rischi') { //45
  header("Content-Type: application/json");
  $answer = "Vuoi approfondire le sostanze legali o illegali?
/sostanze_legali – come ad esempio il tabacco, alcol, ecc.
/sostanze_illegali – cannabis, metamfetamine, cocaina, ecc.
/leggi – vuoi sapere quali sono le ricadute legali dell’uso di sostanze
/testimonianze – vuoi leggere la testimonianza di chi ha fatto uso di droghe illegali?";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/sostanze_legali') { //46
  header("Content-Type: application/json");
  $answer = "Su quale sostanza vuoi ulteriori informazioni?
/alcol – scarica file informativo sull’alcol
/tabacco – scarica file informativo sul tabacco
/sigaretta_elettronica – scarica file informativo sulla sigaretta elettronica";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}


if ($text == '/alcol') { //47
  header("Content-Type: application/json");
  $answer = "Potrebbero interessarti questi file: 
https://socialmi.ats-milano.it/165/social/wiki/02z36t3mEFYy5S_06122019_alcolapprofondimento.pdf
https://socialmi.ats-milano.it/165/social/wiki/81ti7R1HozPbBG_06122019_RISCHIALCOL.pdf";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/tabacco') { //48
  header("Content-Type: application/json");
  $answer = "Potrebbero interessarti questi file: 
https://socialmi.ats-milano.it/165/social/wiki/MQEP1Ids56Gwf3_06122019_Fumoditabaccoapprofondimento.pdf
https://socialmi.ats-milano.it/165/social/wiki/KcLKnSShulQ3XV_06122019_RISCHITABACCO.pdf";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/sigaretta_elettronica') { //49
  header("Content-Type: application/json");
  $answer = "Potrebbe interessarti questo file: 
https://socialmi.ats-milano.it/165/social/wiki/znmQ2icBesT09l_06122019_Sigarettaelettronicaapprofondimento.pdf";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/sostanze_illegali') { //50
  header("Content-Type: application/json");
  $answer = "Su quale sostanza vuoi ulteriori informazioni?
/cannabis – marjuana e hashish
/cocaina – sostanza ad alta dipendenza
/metamfetamine – ecstasy, MDMA, ecc.
/eroina – sostanza sedativa ad alta dipendenza
/ketamina 
/LSD";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/cannabis') { //51
  header("Content-Type: application/json");
  $answer = "Potrebbe interessarti questo file:";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/cocaina') { //52
  header("Content-Type: application/json");
  $answer = "Potrebbe interessarti questo file:
https://socialmi.ats-milano.it/165/social/wiki/rRHDBXCQq0B4gs_06122019_RISCHICOCAINA.pdf";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/metamfetamine') { //53
  header("Content-Type: application/json");
  $answer = "Potrebbe interessarti questo file:
https://socialmi.ats-milano.it/165/social/wiki/lSMkIIjpbPG8M4_06122019_RISCHIECSTASY.pdf";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/eroina') { //54
  header("Content-Type: application/json");
  $answer = "Potrebbe interessarti questo file:
https://socialmi.ats-milano.it/165/social/wiki/w4xQXeL6noWHLF_06122019_RISCHIEROINA.pdf";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/ketamina') { //55
  header("Content-Type: application/json");
  $answer = "Potrebbe interessarti questo file:
https://socialmi.ats-milano.it/165/social/wiki/wH4QEQcbqOm0EI_06122019_RISCHIKETAMINA.pdf";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/LSD') { //56
  header("Content-Type: application/json");
  $answer = "Potrebbe interessarti questo file:
https://socialmi.ats-milano.it/165/social/wiki/4mv5h9yGjAxqWF_06122019_RISCHILSD.pdf";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/leggi') { //57
  header("Content-Type: application/json");
  $answer = "Potrebbe interessarti questo file:
https://socialmi.ats-milano.it/165/social/wiki/Y2Q9siveTxwHAl_06122019_normativa.pdf";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/testimonianze') { //58
  header("Content-Type: application/json");
  $answer = "Potrebbe interessarti questo file:
https://socialmi.ats-milano.it/165/social/wiki/CEktIcM8h7xmbe_06122019_testimonianzesostanze.pdf";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/sostanze_aiuto') { //59
  header("Content-Type: application/json");
  $answer = "Potrebbe interessarti questo file:
https://socialmi.ats-milano.it/165/social/wiki/TlqAGIk2BqGW9z_06122019_servizidipendenze.pdf";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/gioco_azzardo') { //60
  header("Content-Type: application/json");
  $answer = "Seleziona una tra queste opzioni: 
/approfondimento_ga - se ti interessa conoscere qualcosa in più sul tema del gioco d’azzardo
/testimonianza_ga – se vorresti leggere una testimonianza di chi gioca d’azzardo
/aiuto_ga – se hai bisogno di aiuto";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/approfondimento_ga') { //61
  header("Content-Type: application/json");
  $answer = "Potrebbe interessarti questo file:
https://socialmi.ats-milano.it/165/social/wiki/mzjLLIOrqtesTb_06122019_giocodazzardoapprofondimento.pdf";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/testimonianza_ga') { //62
  header("Content-Type: application/json");
  $answer = "Potrebbe interessarti questo file:
https://socialmi.ats-milano.it/165/social/wiki/sX7tWdDeYhq79a_06122019_testimonianzagiocoazzardo.pdf";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/aiuto_ga') { //63
  header("Content-Type: application/json");
  $answer = "Potrebbe interessarti questo file:
https://socialmi.ats-milano.it/165/social/wiki/TlqAGIk2BqGW9z_06122019_servizidipendenze.pdf";
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

