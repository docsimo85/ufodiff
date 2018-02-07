<?php
$content = file_get_contents("php://input"); 
$update = json_decode($content, true);
if(!$update){
  exit;
}
$message = isset($update['message']) ? $update['message'] : "";
$json = file_get_contents('https://chainz.cryptoid.info/ufo/api.dws?q=getdifficulty');
$json2 = file_get_contents('https://chainz.cryptoid.info/ufo/api.dws?q=getblockcount');
$json3 = file_get_contents('https://chainz.cryptoid.info/ufo/api.dws?q=ticker.usd');
$json4 = file_get_contents('https://chainz.cryptoid.info/ufo/api.dws?q=circulating');
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";
$text = trim($text);
$text = strtolower($text);

//COMANDI
if($text == 'lista'){
header("Content-Type: application/json");
$parameters = array('chat_id' => $chatId, "text" =>
        'qui stampo la lista'
);
$parameters["method"] = "sendMessage";
    $keyboard = ['inline_keyboard' => [[['text' =>  'myText', 'callback_data' => 'myCallbackText']]]];
    $parameters["reply_markup"] = json_encode($keyboard, true);
}
else if($text == 'aiuto'){
header("Content-Type: application/json");
$parameters = array('chat_id' => $chatId, "text" =>
        'lista comandi');
$parameters["method"] = "sendMessage";
}
else if(strpos($text, 'aggiungi')){
    header("Content-Type: application/json");
    $parameters = array('chat_id' => $chatId, "text" =>
        'comando per aggiungere prodotti');
    $parameters["method"] = "sendMessage";
}
else if(strpos($text, 'rimuovi')){
    header("Content-Type: application/json");
    $parameters = array('chat_id' => $chatId, "text" =>
        'comando per rimuovere prodotti');
    $parameters["method"] = "sendMessage";
}
;
echo json_encode($parameters);