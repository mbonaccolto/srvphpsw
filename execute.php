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
/*
if ($text == '/covid') { // 1
  header("Content-Type: application/json");
  $answer = "Scegli un argomento specifico tra quelli proposti:
/lavoratori_fragili - info per i lavoratori fragili
/alunni_fragili - info per gli alunni fragili
/sintomi_sospetti - sintomi sospetti 
/sintomi_sospetti_scuola - sintomi a scuola
/sintomi_sospetti_casa - sintomi a casa
/alunno_in_attesa_esito_tampone - se l'alunno ha già fatto il tampone
/isolamento - info sull'isolamento obbligatorio/fiduciario
/accesso_ai_punti_tampone - punti tampone
/alunni_operatori_positivi - se positivi
/alunni_operatori_negativi - se negativi
/contatto_stretto - cosa fare se si è contatto stretto
/problema_salute_no_covid - se non è covid
/compagni_classe_alunno_positivo - cosa fare se alunno positivo
/numero_elevato_di_assenze - cosa succede se le assenze sono numerose
/referente_covid - chi è il referente Covid
/a_chi_rivolgersi - contatti utili
/informazioni_corrette - collegamenti e informazioni generali";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/lavoratori_fragili') { // 2
  header("Content-Type: application/json");
  $answer = "Sono i lavoratori che, per età o patologie pre-esistenti, sono maggiormente esposti a un esito più grave in caso di contagio.
Clicca il seguente link, troverai  a pagina 7 maggiori informazioni sui lavoratori fragili 
https://www.istruzione.it/rientriamoascuola/allegati/Rapporto%20ISS%20COVID%2058_Scuole_21_8_2020.pdf  
Il lavoratore “fragile” può rivolgersi al Medico Competente per avviare la procedura per la sorveglianza sanitaria eccezionale
";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/alunni_fragili') { // 3
  header("Content-Type: application/json");
  $answer = "Gli alunni \"fragili\" sono quelli particolarmente esposti a un rischio potenzialmente maggiore nei confronti dell’infezione da COVID-19.
Le specifiche situazioni degli alunni in condizioni di fragilità saranno valutate in raccordo con il Dipartimento di prevenzione territoriale ed il Pediatra/Medico di famiglia, fermo restando l’obbligo per la famiglia stessa di rappresentare tale condizione alla scuola in forma scritta e documentata, così come previsto dal Protocollo di sicurezza per la ripresa di settembre : 
https://www.istruzione.it/rientriamoascuola/allegati/Rapporto%20ISS%20COVID%2058_Scuole_21_8_2020.pdf

";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/sintomi_sospetti') { // 4
  header("Content-Type: application/json");
  $answer = "Vuoi informazioni specifiche relative ai sintomi sospetti:
/covid_bambini - nei bambini
/covid_popolazione_generale - nella popolazione generale


";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/covid_bambini') { // 5
  header("Content-Type: application/json");
  $answer = "I sintomi sospetti nei bambini sono:
•	Febbre
•	tosse 
•	cefalea
•	sintomi gastrointestinali (nausea/vomito, diarrea)
•	faringodinia
•	dispnea
•	mialgie
•	rinorrea o congestione nasale";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/covid_popolazione_generale') { // 6
  header("Content-Type: application/json");
  $answer = "I sintomi sospetti nella popolazione generale sono:
•	Febbre
•	Brividi
•	Tosse
•	difficoltà respiratorie
•	perdita improvvisa delvl’olfatto (anosmia)
•	diminuzione dell’olfatto (iposmia)
•	perdita del gusto (ageusia)
•	alterazione del gusto (disgeusia)
•	rinorrea/congestione nasale
•	faringodinia
•	diarrea";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/sintomi_sospetti_scuola') { // 7
  header("Content-Type: application/json");
  $answer = "Scarica il file pdf per avere tutte le informazioni utili:
http://www.stopalbullismo.it/wiki/iGWreCq3j6Wmnw_14102020_sintomisospetticovidascuola.pdf
";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/sintomi_sospetti_casa') { // 8
  header("Content-Type: application/json");
  $answer = "L’alunno/a deve rimanere a casa, è necessario contattare tempestivamente il Pediatra o il Medico curante e attenersi alle sue indicazioni. 
L’alunno/a con sintomi sospetti Covid che si manifestano a casa, deve essere segnalato dalla famiglia all’ ATS di Milano accedendo a questo link:
http://portalescuola.ats-milano.it/segnalazionecovid.aspx
la scuola non deve mettere in atto nessun provvedimento se non quelli di sua stretta competenza e i servizi ATS forniranno eventuali indicazioni per la gestione di aspetti di tipo sanitario o di rilevanza di sanità pubblica
";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/alunno_in_attesa_esito_tampone') { // 9
  header("Content-Type: application/json");
  $answer = "In attesa dell’esecuzione o dell’esito del tampone, l’alunno/a NON deve andare a scuola e deve rimanere in isolamento.";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}


if ($text == '/isolamento') { // 10
  header("Content-Type: application/json");
  $answer = "sia per l’isolamento obbligatorio che per l’isolamento fiduciario valgono le seguenti indicazioni:
•	stanza dedicata e dotata di buona ventilazione possibilmente servita da bagno dedicato, dormire da solo/a, e limitare al massimo i movimenti in altri spazi della casa dove vi siano altre persone. 
•	in presenza di altre persone, deve essere mantenuta una distanza di almeno un metro e indossata la mascherina, evitando ogni tipo di contatto diretto
•	lavaggio frequente delle mani 
•	sanificazione di ambienti e superfici
•	automonitoraggio della temperatura 
•	in caso di rialzo della temperatura o insorgenza di sintomi sospetti contattate tempestivamente il medico curante
divieto di spostamenti o viaggio e l’obbligo di rimanere raggiungibile per le attività di sorveglianza sanitaria";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/accesso_ai_punti_tampone') { // 11
  header("Content-Type: application/json");
  $answer = "Scarica il file per l'elenco aggiornato dei punti di accesso:
http://www.stopalbullismo.it/wiki/nH4iBgzheoREVA_14102020_accessoaipuntitampone.pdf
";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/alunni_operatori_positivi') { // 12
  header("Content-Type: application/json");
  $answer = "L’ATS avvia l’indagine e in collaborazione con la Direzione della scuola identifica i soggetti che possono aver avuto contatti stretti con il caso risultato positivo (ad es. i compagni di classe, insegnanti ed eventuali altre persone della scuola).
I soggetti classificati come contatti stretti non potranno frequentare la scuola poiché saranno da ATS posti in isolamento fiduciario per 14 giorni dall’ultimo contatto e comunque fino a esito negativo del tampone di fine isolamento.
I soggetti che non sono stati identificati come contatti stretti possono continuare la frequenza scolastica.
La persona positiva al Covid dovrà osservare un periodo di isolamento obbligatorio e potrà tornare a scuola solo dopo aver avuto la conferma di guarigione che avviene dopo l’effettuazione, al termine del periodo di isolamento, di due tamponi con esito negativo effettuati a distanza di 24/48 ore l’uno dall’altro.
L’attestazione di guarigione è rilasciata dal Pediatra o Medico curante.
";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/alunni_operatori_negativi') { // 13
  header("Content-Type: application/json");
  $answer = "Dopo valutazione del pediatra o medico curante, l’alunno potrà riprendere la frequenza scolastica dietro presentazione di attestazione medica.";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/contatto_stretto') { // 14
  header("Content-Type: application/json");
  $answer = "In caso di contatto stretto extrascolastico, è necessario osservare l’isolamento fiduciario a casa per 14 giorni dall’ultimo contatto con il caso e monitorare il suo stato di salute informando il Pediatra o il Medico curante. Al termine dei 14 giorni dovrà effettuare un tampone che, se negativo, consentirà di riprendere la frequenza scolastica con l’attestazione rilasciata dal
Pediatra o Medico curante.
I compagni di classe e gli altri operatori della scuola non sono soggetti a provvedimenti e pertanto potranno continuare la frequenza scolastica.";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/problema_salute_no_covid') { // 15
  header("Content-Type: application/json");
  $answer = "In caso di problemi di salute è sempre necessario riferirsi al proprio Pediatra o Medico curante. Nel caso in cui il problema di salute, dopo valutazione medica, non sia riconducibile al Covid, e pertanto il tampone non viene eseguito, l’alunno/a potrà tornare a scuola secondo le indicazioni del Pediatra o Medico curante. 
Non è richiesta alcuna certificazione/attestazione per il rientro, analogamente non è richiesta autocertificazione da parte della famiglia.   ma si darà credito alla famiglia e si valorizzerà quella fiducia reciproca alla base del patto di corresponsabilità fra comunità educante e famiglia.
Se hai ulteriori dubbi consulta il seguente link:
https://www.regione.lombardia.it/wps/portal/istituzionale/HP/DettaglioRedazionale/servizi-e-informazioni/cittadini/salute-e-prevenzione/coronavirus/gestione-casi-covid-19
";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/compagni_classe_alunno_positivo') { // 16
  header("Content-Type: application/json");
  $answer = "Quando un alunno risulta positivo al test per SARS-CoV-2, il Dipartimento di Prevenzione notifica il caso e si avviano la ricerca dei contatti e le azioni di sanificazione straordinaria della struttura scolastica nella sua parte interessata. Il referente scolastico COVID-19 deve fornire al Dipartimento di Prevenzione l’elenco dei compagni di classe nonché degli insegnanti del caso confermato che vi sono stati a contatto nelle 48 ore precedenti l’insorgenza dei sintomi. I contatti stretti individuati dal Dipartimento di Prevenzione con le consuete attività di contact tracing saranno posti in quarantena per 14 giorni dalla data dell’ultimo contatto con il caso confermato. Il Dipartimento di Prevenzione deciderà la strategia più adatta circa eventuali screening al personale scolastico e agli alunni.";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/numero_elevato_di_assenze') { // 17
  header("Content-Type: application/json");
  $answer = "Il referente scolastico per il COVID-19 deve comunicare al Dipartimento di Prevenzione se si verifica un numero elevato di assenze improvvise di studenti in una classe o di insegnanti. Il Dipartimento effettuerà un’indagine epidemiologica per valutare le azioni di sanità pubblica da intraprendere, tenendo conto della presenza di casi confermati nella scuola o di focolai di COVID-19 nella comunità.";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/referente_covid') { // 18
  header("Content-Type: application/json");
  $answer = "Scegli uno dei due argomenti:
/chi_e_il_referente_covid - chi è il referente Covid?
/formazione_referente_covid - quale formazione per il referente Covid?
";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/chi_e_il_referente_covid') { // 19
  header("Content-Type: application/json");
  $answer = "Il Referente scolastico per COVID-19 svolge un ruolo di interfaccia con il Dipartimento di prevenzione. In presenza di casi confermati COVID-19 a scuola, il Referente collabora con il Dipartimento di prevenzione nell’attività di tracciamento dei contatti  fornendo: l’elenco degli studenti della classe in cui si è verificato il caso confermato, l’elenco degli insegnanti/educatori/esperti che hanno svolto attività all’interno della classe in cui si è verificato il caso confermato, elementi per la ricostruzione dei contatti stretti avvenuti nelle 48 ore prima della comparsa dei sintomi (per gli asintomatici considerare le 48 ore precedenti la raccolta del campione che ha portato alla diagnosi) e quelli avvenuti nei 14 giorni successivi alla comparsa dei sintomi (o della diagnosi), elenco degli alunni/operatori scolastici con fragilità ed eventuali elenchi di operatori scolastici e/o alunni assenti.";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/formazione_referente_covid') { // 20
  header("Content-Type: application/json");
  $answer = "Il percorso formativo sarà erogato tramite Formazione A Distanza (FAD) sulla piattaforma EDUISS dell’Istituto Superiore di Sanità e sarà fruibile in modalità asincrona nel periodo dal 28 agosto al 31 dicembre 2020.";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}


if ($text == '/a_chi_rivolgersi') { // 21
  header("Content-Type: application/json");
  $answer = "Il Ministero dell’Istruzione ha attivato un help desk. Le scuole potranno chiamare il numero verde 800903080 dal lunedì al sabato, dalle 9:00 alle 13:00 e dalle 14:00 alle 18:00. 
Il servizio raccoglie quesiti e segnalazioni sull’applicazione delle misure di sicurezza e fornisce alle istituzioni scolastiche assistenza e supporto operativo anche di carattere amministrativo.";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

if ($text == '/informazioni_corrette') { // 22
  header("Content-Type: application/json");
  $answer = "Per ulteriori informazioni, scarica il seguente file pdf:
http://www.stopalbullismo.it/wiki/oGeJhCCk0TIPMm_14102020_informazionicorrette.pdf
";
  $parameters = array('chat_id' => $chatId, "text" => $answer);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}  

// fine comandi
header("Content-Type: application/json");
$parameters = array('chat_id' => $chatId, "text" => "Se non utilizzi i comandi mi limito a ripetere ciò che mi hai scritto: ".$text);
// $parameters = array('chat_id' => $chatId, "text" => $answer);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
*/

// BOT spento
header("Content-Type: application/json");
$parameters = array('chat_id' => $chatId, "text" => "Questo BOT non è più attivo. Ultimo comando digitato: ".$text);
// $parameters = array('chat_id' => $chatId, "text" => $answer);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
?>

