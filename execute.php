<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);
if(!$update){
  exit;
}
function curl_get_contents($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
$message = isset($update['message']) ? $update['message'] : "";
$json = file_get_contents('https://chainz.cryptoid.info/explorer/api.dws?q=summary');
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";
$text = trim($text);
$text = strtolower($text);
header("Content-Type: application/json");
$parameters = array('chat_id' => $chatId, "text" => curl_get_contents('https://chainz.cryptoid.info/explorer/api.dws?q=summary'));
$parameters["method"] = "sendMessage";
$parameters["reply_markup"] = '{ "keyboard": [["uno", "due"], ["tre", "quattro"], ["cinque"]], "resize_keyboard": true, "one_time_keyboard": false}';
echo json_encode($parameters);