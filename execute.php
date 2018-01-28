<?php
$content = file_get_contents("php://input"); 
$update = json_decode($content, true);
if(!$update){
  exit;
}
$message = isset($update['message']) ? $update['message'] : "";
$json = file_get_contents('https://chainz.cryptoid.info/ufo/api.dws?q=getdifficulty');
$json2 = file_get_contents('https://chainz.cryptoid.info/ufo/api.dws?q=getblockcount');
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";
$text = trim($text);
$text = strtolower($text);
if($text == '!network'){
header("Content-Type: application/json");
$parameters = array('chat_id' => $chatId, "text" => 'UFO coin difficulty and block height:'.chr(10).'Current diff: '.json_decode($json,true).chr(10).'Current block: '.json_decode($json2,true)); 
$parameters["method"] = "sendMessage";
//$parameters["reply_markup"] = '{ "keyboard": [["uno", "due"], ["tre", "quattro"], ["cinque"]], "resize_keyboard": true, "one_time_keyboard": false}';
}
else if($text == '!help'){
header("Content-Type: application/json");
$parameters = array('chat_id' => $chatId, "text" => 'UFO coin difficulty and block height Bot'.chr(10).'Just type !network and bot will reply with difficulty and block height.'.chr(10).'If you find it useful donations are welcome :) UFO Address: BwJvr6HVnnsHRK7PArc72yrLXYEe52yAYp'); 
$parameters["method"] = "sendMessage";
}
else if($text == '/start'){
header("Content-Type: application/json");
$parameters = array('chat_id' => $chatId, "text" => 'UFO coin difficulty and block height Bot'.chr(10).'Just type !network and bot will reply with difficulty and block height.'.chr(10).'If you find it useful donations are welcome :) UFO Address: BwJvr6HVnnsHRK7PArc72yrLXYEe52yAYp'); 
$parameters["method"] = "sendMessage";
}
;
echo json_encode($parameters);