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
  https://socialmi.ats-milano.it/165/social/wiki/07WMVsTuPFJs5i_16012020_consultori.pdf";
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
https://socialmi.ats-milano.it/165/social/wiki/p69mZJ2zqu9otl_21112019_genereorientamento.pdf
  
Se ti va guarda anche questo video: 
https://socialmi.ats-milano.it/165/social/wiki/IiKey79Uc3gt3U_23012020_videoplayback.mp4";
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
http://www.netyx.it/lamore-e-rispetto/
Mi raccomando, amare bene significa anche conoscere il significato di violenza. 
Forse questo video potrebbe aiutarti: 
https://socialmi.ats-milano.it/165/social/wiki/o8tW1vR30x9nTZ_23012020_videoplayback.mp4";
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
  $answer = "
Dai un’occhiata a questo file, ti chiarirà le idee sul significato di identità di genere: 
https://socialmi.ats-milano.it/165/social/wiki/p69mZJ2zqu9otl_21112019_genereorientamento.pdf

Ti consiglio anche di guardare questi video: 
https://socialmi.ats-milano.it/165/social/wiki/hJ3HBsHQzH8kZe_23012020_videoplayback.mp4
https://socialmi.ats-milano.it/165/social/wiki/IiKey79Uc3gt3U_23012020_videoplayback.mp4
";
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

if ($text == '/dipendenze') { //40 ex /sostanze
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
https://socialmi.ats-milano.it/165/social/wiki/81ti7R1HozPbBG_06122019_RISCHIALCOL.pdf

E questo video che in pochi minuti ti spiega tutto quello che devi sapere sull'alcol: 
https://socialmi.ats-milano.it/165/social/wiki/eOiyrKw182icnx_20012020_TUTTOQUELLOCHEDEVISAPERESULLALCOL.mp4";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/tabacco') { //48
  header("Content-Type: application/json");
  $answer = "Potrebbero interessarti questi file: 
https://socialmi.ats-milano.it/165/social/wiki/MQEP1Ids56Gwf3_06122019_Fumoditabaccoapprofondimento.pdf
https://socialmi.ats-milano.it/165/social/wiki/KcLKnSShulQ3XV_06122019_RISCHITABACCO.pdf

Se ti va, guarda anche questo video sul “perché non riesci a smettere di fumare”: 
https://socialmi.ats-milano.it/165/social/wiki/xcuiVvCK6ifJOe_20012020_PERCHNONRIESCIASMETTEREDIFUMARE.mp4
";
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
  $answer = "Potrebbe interessarti questo file:
https://socialmi.ats-milano.it/165/social/wiki/x8sD4f3wDWVZDh_06122019_RISCHICANNABIS.pdf";
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

if ($text == '/lsd') { //56
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

//--- sezione sostituita da GAP ----//
/*
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

*/



//---- Sezione bullismo/cyberbullismo ----//

if (($text == '/bullismo') || ($text == '/cyberbullismo')) { //80
  header("Content-Type: application/json");
  $answer = "Ciao, ti chiedo di selezionare tra queste opzioni: 
/approfondimento_bullismo - approfondimento
/hosubito – se hai subito un episodio di bullismo
/hoassistito – se hai assistito ad un episodio di bullismo
/aiuto - a chi chiedere aiuto in caso di bullismo o cyberbullismo
/legge – cosa dice la legge
/intensita - intensità dell'azione 
";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/approfondimento_bullismo') { //81
  header("Content-Type: application/json");
  $answer = "Cosa ti piacerebbe conoscere nel dettaglio?
/caratteristiche 
/tipologie
/attori – per conoscere chi può essere coinvolto in un episodio di bullismo";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/caratteristiche') { //82
  header("Content-Type: application/json");
  $answer = "Scarica il file:
https://socialmi.ats-milano.it/165/social/wiki/e9PzznmQ2icBes_20012020_caratteristichebullismo.pdf";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/tipologie') { //83
  header("Content-Type: application/json");
  $answer = "Scarica il file:
https://socialmi.ats-milano.it/165/social/wiki/T09lS4PKA8j3hO_20012020_tipidibullismo.pdf";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/attori') { //84
  header("Content-Type: application/json");
  $answer = "Scarica il file:
https://socialmi.ats-milano.it/165/social/wiki/dpeREPQ0PMODJb_20012020_attori.pdf";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/hosubito') { //85
  header("Content-Type: application/json");
  $answer = "Non ti preoccupare, il bullismo è un fenomeno diffuso che riguarda oltre il 10% della popolazione studentesca. 
Questo non toglie il fatto che tu debba comunque essere aiutato.
Troverai delle informazioni utili a questo link:
https://socialmi.ats-milano.it/165/social/wiki/6EjBlkDm1kqUpr_20012020_hosubito.pdf";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/hoassistito') { //86
  header("Content-Type: application/json");
  $answer = "Bravo! Se sei qua a parlare con me vuol dire che non stai voltando lo sguardo “dall’altra parte”, e non sei un indifferente. 
Devi sapere che adesso hai a disposizione quattro strategie: 
- prenderti cura della vittima: /prenditicura
- adottare comportamenti a favore della vittima: /provittima
-contrastare il bullo: /contrastobullo
-chiedere aiuto: /aiuto
In più, troverai delle informazioni utili a questo link:
https://socialmi.ats-milano.it/165/social/wiki/zueZXK5tAKe3GM_20012020_hoassistito.pdf";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/aiuto') { //87
  header("Content-Type: application/json");
  $answer = "Puoi iniziare a parlarne con un adulto di tua fiducia o puoi rivolgerti a uno psicologo che potrai trovare a scuola oppure in un servizio pubblico. In questi servizi, come i consultori familiari e i centri dell’infanzia e dell’adolescenza, troverai un aiuto specializzato nel rispetto della tua privacy. 
Scarica il materiale informativo per visualizzare i contatti:
- elenco dei consultori: 
https://socialmi.ats-milano.it/165/social/wiki/07WMVsTuPFJs5i_16012020_consultori.pdf

- modulo per il cyberbullismo: 
https://socialmi.ats-milano.it/165/social/wiki/sHXK5VTZ8l9KkQ_15012020_I9rCzEJy3plg5e24012018Modelloperlasegnalazionereclamoinmateriadicyberbullismo.pdf";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/legge') { //88
  header("Content-Type: application/json");
  $answer = "Ricordati che c’è una legge specifica che contrasta bullismo e cyberbullismo. 
https://socialmi.ats-milano.it/165/social/wiki/vzRiRuRfXm6VlJ_15012020_LEGGE71.pdf";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/intensita') { //89
  header("Content-Type: application/json");
  $answer = "Il bullismo e il cyberbullismo, quando si verificano, sono sempre delle urgenze. Va valutata l’intensità dell’azione di vessazione per adeguare le azioni da intraprendere. Nello specifico:
/alta_intensita: Alta intensità
/media_intensita: Media intensità
/bassa_intensita: Bassa intensità";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/alta_intensita') { //90
  header("Content-Type: application/json");
  $answer = "Si tratta di azione che hanno una grave ripercussione fisica e/o psicologica. Azioni ripetute di bullismo e cyberbullismo in fase acuta: sexting, cyberstalking, furto di identità. Prevede l’intervento delle forze dell’ordine e/o denuncia/querela.";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/media_intensita') { //91
  header("Content-Type: application/json");
  $answer = "Si tratta di azioni che hanno una spiacevole ripercussione fisica e/o psicologica. Azioni ripetute di bullismo e cyberbullismo in fase iniziale. Prevede l’attivazione delle forze dell’ordine per gli episodi di cyberbullismo.";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/bassa_intensita') { //92
  header("Content-Type: application/json");
  $answer = "Si tratta di azioni che hanno linguaggio offensivo, litigi online, esclusioni da chat, molestie, scherzi spiacevoli, lievi prepotenze, discriminazioni, uso improprio dei dispositivi durante le ore di lezione. Non prevede necessariamente l’attivazione delle forze dell’ordine.";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/prenditicura') { //93
  header("Content-Type: application/json");
  $answer = "•	Fai sentire alla vittima che non è sola e che può contare sul tuo aiuto, dicendole parole di conforto e cercando una soluzione insieme. 
•	Fai sentire la vittima protetta e al sicuro grazie anche a te. 
•	Consola la vittima nel modo che più può esserle d’aiuto, dicendole qualcosa di carino, offrendole un dolcetto o ascoltando insieme la sua canzone preferita. 
•	Fai i complimenti alla vittima per qualcosa che indossa o per un tratto del suo carattere, aiuterà la vittima a non sentirsi sola e abbandonata da tutti.";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/provittima') { //94
  header("Content-Type: application/json");
  $answer = "•	Fai partecipare la vittima alle attività del tuo gruppo, invitandola al cinema con voi, al tuo compleanno o a cena a casa tua. 
•	Difendi la vittima, dicendo al bullo di smetterla, cercando di mantenere sempre un tono di voce calmo e fermo. 
•	Organizza dei giochi con la vittima, facendola sentire accettata.
•	Fai sentire la vittima parte di un gruppo e accettata dagli altri. Chiedi agli altri compagni di coinvolgerla durante l’intervallo o quando fanno qualcosa durante il pomeriggio.";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/contrastobullo') { //95
  header("Content-Type: application/json");
  $answer = "•	Se vedi offese sui social e nelle chat, usa il comando “segnala” e chiedi a Facebook o Instagram di rimuovere il contenuto. Potresti chiedere anche ad altri compagni di segnalarlo. Più persone lo fanno, più è probabile che venga rimosso. 
•	Cancella e interrompi le offese online.
•	Non ridere, incoraggiare o dare corda ai bulli, anzi chiedi loro di smettere.
•	Fai smettere le prese in giro, soprattutto se la vittima è sempre la stessa.
•	Opponiti alle prepotenze quando la vittima non può difendersi.";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

//---- Sezione GAP (Gioco Azzardo Patologico) ----//


if ($text == '/gioco_azzardo') { //101
  header("Content-Type: application/json");
  $answer = "Scegli un argomento specifico tra quelli proposti:
    •	/gioco_azzardo_definizione
    •	/gioco_azzardo_online_definizione
    •	/rischi_del_gioco_online
    •	/caratteristiche_gioco_azzardo
    •	/gioco_azzardo_soggetti
    •	/conseguenze_del_gioco
    •	/gioco_azzardo_aiuto_gap
    •	/normativa_gap";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/gioco_azzardo_definizione') { //102
  header("Content-Type: application/json");
  $answer = "Il gioco d’azzardo è una tipologia di gioco nel quale ricorre il fine di lucro e la vincita o perdita è completamente o quasi aleatoria. Esso consiste nello scommettere beni, principalmente denaro sull’esito di un evento futuro.  
  Per saperne di più guarda il video:
  https://www.youtube.com/watch?v=YRZZ3mKdZWA 
  ";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/gioco_azzardo_online_definizione') { //103
  header("Content-Type: application/json");
  $answer = "Il gambling online, conosciuto anche come Internet gambling o Gambling è un termine generale con cui vengono indicati i diversi modi di giocare d’azzardo tramite internet.
  Sono infatti disponibili una vasta gamma di giochi sul web, tra cui i più popolari sono il Poker, il Casino, le scommesse sportive, il “mobile gambling” (giochi disponibili per tablet e smartphone), il bingo e la lotteria.
  Per approfondire clicca qui:
  https://www.youtube.com/watch?v=66h0C97IGcQ";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/rischi_del_gioco_online') { //104
  header("Content-Type: application/json");
  $answer = "Rischio del gioco online:
  https://socialmi.ats-milano.it/165/social/wiki/i7Sda2V6U9csO3_28092020_rischiogiocoonline.png";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/caratteristiche_gioco_azzardo') { //105
  header("Content-Type: application/json");
  $answer = "/alea – la fortuna
  /scommessa – caratteristica essenziale
  /minimizzazione_rischio – valutazione rischio
  /tipologie_di_gioco
  ";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/alea') { //106
  header("Content-Type: application/json");
  $answer = "Con il termine Alea intendiamo la Fortuna. Il risultato dell’azione di gioco dipende infatti esclusivamente dalla fortuna, dal caso (RISULTATO ALEATORIO) Il giocatore e le sue abilità non influenzano la vincita e la perdita";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/scommessa') { //107
  header("Content-Type: application/json");
  $answer = "La scommessa è una delle caratteristiche essenziali del gioco d’azzardo. Il giocatore per giocare mette in palio una posta, una somma di denaro o un oggetto di valore che una volta puntati non possono essere più ritirati.";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/minimizzazione_rischio') { //108
  header("Content-Type: application/json");
  $answer = "il giocatore tende a non ammettere di avere un problema, a minimizzare la situazione sottovalutando i  rischi del gioco. Non riesce quindi a chiedere aiuto nel modo corretto.";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/tipologie_di_gioco') { //109
  header("Content-Type: application/json");
  $answer = "Conosci le varie tipologie del gioco d’azzardo? Continua ad approfondire l’argomento utilizzando i comandi della chat bot
  •	/gioco_informale_ricreativo
  •	/gioco_problematico
  •	/gioco_patologico";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/gioco_informale_ricreativo') { //110
  header("Content-Type: application/json");
  $answer = "Gioco informale ricreativo:
  https://socialmi.ats-milano.it/165/social/wiki/sG0PgKUghL4Mcd_05102020_GiocoRicreativofine.jpg";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}


if ($text == '/gioco_problematico') { //111
  header("Content-Type: application/json");
  $answer = "Gioco problematico:
  https://socialmi.ats-milano.it/165/social/wiki/k92OSw8znUTmLV_05102020_GiocoProblematicofine.jpg";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}


if ($text == '/gioco_patologico') { //112
  header("Content-Type: application/json");
  $answer = "Gioco patologico:
  https://socialmi.ats-milano.it/165/social/wiki/fxziEVMXgMavK0_05102020_GiocoPatologicofine.jpg";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}


//---- Altro ----//

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

