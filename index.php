<?php

//-------------------------
// Dev : @DevMrAmir
// Channel : @AlaCode
//-------------------------


// ------- Telegram -------
$telegram_ip_ranges = [
    ['lower' => '149.154.160.0', 'upper' => '149.154.175.255'],
    ['lower' => '91.108.4.0',    'upper' => '91.108.7.255'],
    ];
    $ip_dec = (float) sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));
    $ok=false;
    foreach ($telegram_ip_ranges as $telegram_ip_range) if (!$ok) {
    if(!$ok){
    $lower_dec = (float) sprintf("%u", ip2long($telegram_ip_range['lower']));
    $upper_dec = (float) sprintf("%u", ip2long($telegram_ip_range['upper']));
    if($ip_dec >= $lower_dec and $ip_dec <= $upper_dec){
    $ok=true;
    }}}
    if(!$ok){
    exit(header("location: https://coffemizban.com"));
    }
error_reporting(0);
// ------- include -------
include("config.php");
// ------- Telegram -------
$update = json_decode(file_get_contents('php://input'));
if(isset($update->message)){
$chat_id = $update->message->chat->id;
$text = $update->message->text;
$from_id = $update->message->from->id;
$first = $update->message->from->first_name;
$forchaneel = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=@$channel_bot&user_id=".$from_id));
$tch = $forchaneel->result->status;
$message_id = $update->message->message_id;
$phoneid = $update->message->contact->user_id;
$phone =$update->message->contact->phone_number;
}
if (isset($update->callback_query)){
$chat_id = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$user_id = $update->callback_query->id;
$from_id = $update->callback_query->from->id;
$message_id = $update->callback_query->message->message_id;
$first2 = $update->callback_query->message->chat->first_name;
$last2 = $update->callback_query->message->chat->last_name;
$chatid = $update->callback_query->message->chat->id;
$message_id2 = $update->callback_query->message->message_id;
$tc = $update->callback_query->chat->type;
}
// Anti Code
if(strpos($text, 'zip') !== false or strpos($text, 'ZIP') !== false or strpos($text, 'Zip') !== false or strpos($text, 'ZIp') !== false or strpos($text, 'zIP') !== false or strpos($text, 'ZipArchive') !== false or strpos($text, 'ZiP') !== false){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"??? | ???? ?????????? ???? ???????? ?????????????? ????????",
        'parse_mode'=>"HTML",
        ]);
    exit;
    }
    if(strpos($text, 'kajserver') !== false or strpos($text, 'update') !== false or strpos($text, 'UPDATE') !== false or strpos($text, 'Update') !== false or strpos($text, 'https://api') !== false){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"??? | ???? ?????????? ???? ???????? ?????????????? ????????",
        'parse_mode'=>"HTML",
        ]);
    exit;
    }
    if(strpos($text, '$') !== false or strpos($text, '{') !== false or strpos($text, '}') !== false){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"??? | ???? ?????????? ???? ???????? ?????????????? ????????",
        'parse_mode'=>"HTML",
        ]);
    exit;
    }
    if(strpos($text, '"') !== false or strpos($text, '(') !== false or strpos($text, '=') !== false){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"??? | ???? ?????????? ???? ???????? ?????????????? ????????",
        'parse_mode'=>"HTML",
        ]);
    exit;
    }
    if(strpos($text, 'getme') !== false or strpos($text, 'GetMe') !== false){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"??? | ???? ?????????? ???? ???????? ?????????????? ????????",
        'parse_mode'=>"HTML",
        ]);
    exit;
    }
// Join
if($tch == 'left'){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
 ??????| ???????? ???????? ?????? ?????????????? ???? ???????? ???? ???? ?????? ???? ?????????? ????????.
???? ~ |??? @$channel_bot ???

????| ?????? ???????? ???????? ???? ??? /start ??? ???????? !
",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"???? ?????????? ????",'url'=>"https://t.me/$channel_bot?start"]],
]
])
]);
exit();
}
// ------- if -------

if($text == "/start"){
    
$sql    = "SELECT `id` FROM `users` WHERE `id`=$chat_id";
$result = mysqli_query($conn,$sql);

$res = mysqli_fetch_assoc($result);

if(!$res){
    
    $sql2    = "INSERT INTO `users` (id, coin, step, refral, phone, refid) VALUES ($chat_id, 0, 'none', 0, 1, 1)";
    $result2 = mysqli_query($conn,$sql2);
}
}

if(isset($text)){
    
    $ph = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `phone` FROM `users` WHERE `id`=$chat_id LIMIT 1"));
    if($ph['phone'] == 1){
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
???? ???????? ?????????? ???????????? ?????? ???? ?????????? ????????????.

?????????? ?????????????? ???? ???????? ???? ???????? ?????? ???????? ???????? ?????? ?????????? ?????? ???? ?????????? ???????????? ?? ?????? ?????????? ???? ???????? ????????.

???????????????? ?????? ?????? ???? ?????????? ?????? ?? ?????? ???????? ???? ???? ???????????? ???????????? ????????.
",
'reply_markup' => json_encode([ 
'resize_keyboard'=>true, 
'keyboard' => [ 
[['text'=>"????????????? ?????????????",'request_contact'=>true]],
], 
]) 
]);
exit;
}
}
// Menu
$key1        = '???? ???????????? ????????';
$key2        = '??????????? ???????? ????????????';
$key3        = '???? ?????????????????? ????????';
$key5        = '???? ???????????? ?? ????????????';
$ref_ok      = '???? ???????? ??????????';
$key_support = '??????????? | ????????????????';
   
    $reply_keyboard = [
                        [$key1] ,
                        [$key2 , $key3, $key5] ,
                        [$ref_ok],
                        [$key_support],

                      ];
 
    $reply_kb_options = [
                            'keyboard'          => $reply_keyboard ,
                            'resize_keyboard'   => true ,
                            'one_time_keyboard' => false ,
                        ];

$key4                 = '???? | ???????? ????????';
$key_hmgani           = '???? | ???????? ????????????'; 
$key_forvard          = '???? | ?????????????? ????????????';
$suppprt_result       = '?????? | ???????? ???? ??????????';
$send_coin            = '???? | ???????? ????????????';
$sendnot_coin         = '???? | ?????? ????????????';
$reply_keyboard_panel = [
                        [$key4] ,
                        [$key_hmgani, $key_forvard] ,
                        [$suppprt_result] ,
                        [$send_coin, $sendnot_coin]

                      ];
 
    $reply_kb_options_panel = [
                            'keyboard'          => $reply_keyboard_panel ,
                            'resize_keyboard'   => true ,
                            'one_time_keyboard' => false ,
                        ];
                        
$back = '?????? ????????????';

$reply_keyboard_back = [
                        [$back] ,

                      ];
 
    $reply_kb_options_back = [
                            'keyboard'          => $reply_keyboard_back ,
                            'resize_keyboard'   => true ,
                            'one_time_keyboard' => false ,
                        ];
                        
                        
// if

if($data == "re"){
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"??????",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
    ['text'=>"???? ?????????? ????",'url'=>"https://t.me/$channel_bot"]
],
]
])
]);
}
                        
if($data == "help"){
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"??????",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
    ['text'=>"???? ?????????? ????",'url'=>"https://t.me/$channel_bot"]
],
]
])
]);
}

$adminstep = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `step` FROM `users` WHERE `id`=$from_id LIMIT 1"));
if($adminstep['step'] == "support" and $text != $back){
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"??? ???????? ???? ???????????? ?????????? ????",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options),
]);

bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"??????????? ???????? ?????????? ???? ???????? ???????? ???????? 

???? ?????? ???????? : $text
???? ?????????? ?????????? : $chat_id",
'parse_mode'=>"HTML",
]);
mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}
else{
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}
if($adminstep['step'] == "key_hmgani" and $text != $back){
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    
$sql    = "SELECT * FROM `users`";
$result = mysqli_query($conn,$sql);
 
 while($row = mysqli_fetch_assoc($result)){
        
    bot('sendMessage',[
'chat_id'=>$row['id'],
'text'=>"$text",
'parse_mode'=>"HTML",
]);
}
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"??? ?????????? ????",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_panel),
]);
}
else{
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}
if($adminstep['step'] == "key_forvard" and $text != $back){
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$admin' LIMIT 1");
 
$sql    = "SELECT * FROM `users`";
$result = mysqli_query($conn,$sql);
 
 while($row = mysqli_fetch_assoc($result)){
        
    bot('ForwardMessage',[
'chat_id'=>$row['id'],
'from_chat_id'=>$chat_id,
'message_id'=>$message_id
]);
    }
 
    bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"??? ?????????? ????",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_panel),
]);
}
if($adminstep['step'] == "sharj"){
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"???  ???????????? ?????????? ????",
'parse_mode'=>"HTML",
]);

bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"???  ???????????? ?????????? ???????? ????????
???????? ???????? : $chat_id
?????????? : $text
",
'parse_mode'=>"HTML",
]);
}

if($adminstep['step'] == "ref_ok" and $text != $back){
    
    $sql    = "SELECT `id` FROM `users` WHERE `id`=$text";
$result = mysqli_query($conn,$sql);

$res = mysqli_fetch_assoc($result);

if(!$res){
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"??? ???? ???????? ???????????? ??????",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options),
]);
mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}
else{
    
    $user_ref = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `coin` FROM `users` WHERE `id`=$text LIMIT 1"));
    $ad_ref   = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `coin` FROM `users` WHERE `id`=$chat_id LIMIT 1"));
    $ad_ref = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `refral` FROM `users` WHERE `id`=$text LIMIT 1"));
    
    $coin_user = $user_ref['coin'] + $co_re;
    $user_reco = $ad_ref['coin'] + $co_re;
    $ad_ref2   = $ad_ref['refral'] + 1;
    
    mysqli_query($conn,"UPDATE `users` SET `coin`=$coin_user WHERE id='$text' LIMIT 1");
    mysqli_query($conn,"UPDATE `users` SET `coin`=$user_reco WHERE id='$chat_id' LIMIT 1");
    mysqli_query($conn,"UPDATE `users` SET `refid`=$text WHERE id='$chat_id' LIMIT 1");
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    mysqli_query($conn,"UPDATE `users` SET `refral`=$ad_ref2 WHERE id='$text' LIMIT 1");
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"??? ???? ???????????? ?????????? ???? ???????? ?????????? ????",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options),
]);

bot('sendMessage',[
'chat_id'=>$text,
'text'=>"???? ???? ?????? ???? ?????? ???? ???? ???????? ?????????? ???????? ?????? ???????? ???? ?????????????? ?????????? ????",
'parse_mode'=>"HTML",
]);
}
}
else{
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}

if(isset($update->message->contact)){
    if($update->message->contact->user_id == $from_id){
        $phone =$update->message->contact->phone_number;
        if(strpos($phone,'98') === 0 || strpos($phone,'+98') === 0){
            $phone = '0'.strrev(substr(strrev($phone),0,10));
            mysqli_query($conn,"UPDATE users SET phone='$phone' WHERE id='$phoneid' LIMIT 1");
            bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"??? ?????????? ???????? ?????? ???? ???????????? ?????? ?? ?????????? ????.",
'reply_markup'=>json_encode($reply_kb_options),
]);

bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"???? ?????? ?????? ????????

?????? : $phone
???? : $from_id",
]);
        }
        else{
            bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"???????? ?????? ???????? ???????? ?????? ?????????? ???????? ??????",
]);
exit;
        }
        
    }
}

if($adminstep['step'] == "send_coin" and $text != $back){
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    
    $text_admin = explode(",",$text);
    $user_id = $text_admin['0'];
    $text_admin_for_coin = $text_admin['1'];
    
    $ad_coin = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `coin` FROM `users` WHERE `id`=$user_id LIMIT 1"));
    $coin    = $ad_coin['coin'] + $text_admin_for_coin;
    
    mysqli_query($conn,"UPDATE `users` SET `coin`=$coin WHERE id='$user_id' LIMIT 1");
    
    bot('sendmessage',[
'chat_id'=>$user_id,
'text'=>"???? ???? ?????? ???????????? ???????? $text_admin_for_coin ?????????? ???????? ?????? ?????????? ????",
]);

bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"??? ?????????? ????",
'reply_markup'=>json_encode($reply_kb_options_panel),
]);
}
else{
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}
if($adminstep['step'] == "sendnot_coin" and $text != $back){
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    
    $text_admin = explode(",",$text);
    $user_id = $text_admin['0'];
    $text_admin_for_coin = $text_admin['1'];
    
    $ad_coin = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `coin` FROM `users` WHERE `id`=$user_id LIMIT 1"));
    $coin    = $ad_coin['coin'] - $text_admin_for_coin;
    
    mysqli_query($conn,"UPDATE `users` SET `coin`=$coin WHERE id='$user_id' LIMIT 1");
    
    bot('sendmessage',[
'chat_id'=>$user_id,
'text'=>"??? ???? ?????? ???????????? ???????? $text_admin_for_coin ?????? ????",
]);

bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"??? ?????????? ????",
'reply_markup'=>json_encode($reply_kb_options_panel),
]);
}
else{
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}

if($adminstep['step'] == "suppprt_result" and $text != $back){
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    
    $text_admin = explode(",",$text);
    $user_id = $text_admin['0'];
    $text_admin = $text_admin['1'];
    
    
    bot('sendmessage',[
'chat_id'=>$user_id,
'text'=>"??????????? ???? ???????? ???? ?????? ???????????? ???????????? ?????? 

???? : $text_admin",
]);

bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"??? ?????????? ????",
'reply_markup'=>json_encode($reply_kb_options_panel),
]);
}
else{
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}
// function 

switch($text) {
 
        case "/start" : show_menu();        break;
        case $key1    : sharj();            break;
        case $key2    : profile();          break;
        case $key3    : refrul();           break;
        case $key5    : help();             break;
        case $key_support    : support();   break;
        case $back    : back();             break;
        case $ref_ok    : ref_ok();         break;
      
        
    }
    
if($from_id == $admin){
    
    switch($text) {
 
        case $key4 : statistics();                break;
        case "/admin" : panel();                  break;
        case $key_hmgani : key_hmgani();          break;
        case $key_forvard : key_forvard();        break;
        case $suppprt_result : suppprt_result();  break;
        case $send_coin : send_coin();            break;
        case $sendnot_coin : sendnot_coin();      break;
    }
}


function show_menu(){
    global $reply_kb_options;
    global $chat_id;

bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"???? - ???????? ???? ???????? ???? ?????? ????????

?????? ???????? ?????? ???? ?????????? ?????? ?????? ?????????????? ???? ????",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options),
]);
}
function sharj(){
    
    global $chat_id;
    global $conn;
    
$sql    = "SELECT `coin` FROM `users` WHERE `id`=$chat_id";
$result = mysqli_query($conn,$sql);

$res = mysqli_fetch_assoc($result);

if($res['coin'] >= 10000){
    
    $coin = $res['coin'];
    $coin2 = $coin - 10000;
    mysqli_query($conn,"UPDATE `users` SET `coin`=$coin2 WHERE id='$chat_id' LIMIT 1");
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"?????????? ??????",
'parse_mode'=>"HTML",
]);
mysqli_query($conn,"UPDATE `users` SET `step`='sharj' WHERE id='$chat_id' LIMIT 1");
}
else{
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"10 ?????? ???????????? ??????????",
'parse_mode'=>"HTML",
]);
}
}
function profile(){

    global $chat_id;
    global $conn;
    
$sql    = "SELECT * FROM `users` WHERE `id`=$chat_id";
$result = mysqli_query($conn,$sql);

$res = mysqli_fetch_assoc($result);

$phone = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `phone` FROM `users` WHERE `id`=$chat_id LIMIT 1"));

$refrul = $res['refral'];
$coin   = $res['coin'];
$phone2 = $phone['phone'];
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"???? ?????????????? ???????? ?????? :",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
    ['text'=>"???? ?????????? ????????",'callback_data'=>"aaaa"],
    ['text'=>"$chat_id",'callback_data'=>"aaaa"],
],
[
    ['text'=>"???? ???????????? ????????",'callback_data'=>"aaaa"],
    ['text'=>"$coin ??????????",'callback_data'=>"aaaa"],
],
[
    ['text'=>"???? ?????????? ?????? ????????????",'callback_data'=>"aaaa"],
    ['text'=>"$refrul",'callback_data'=>"aaaa"],
],
[
    ['text'=>"?????? ?????????? ??????????",'callback_data'=>"aaaa"],
    ['text'=>"$phone2",'callback_data'=>"aaaa"],
],
]
])
]);
}
function refrul(){
    
    global $chat_id;
    global $bot_id;
    global $co_re;
    
        bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
??????

code : $chat_id",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
    ['text'=>"???? ?????? ?????? ???? ??????????????????",'callback_data'=>"aaaa"],
    ['text'=>"$co_re ??????????",'callback_data'=>"aaaa"],
],
]
])
]);
}
function help(){
    
    global $chat_id;
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"???? ???? ?????? ?????? ???????????? ????????",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
    ['text'=>"???? ????????????",'callback_data'=>"help"],
    ['text'=>"???? ????????????",'callback_data'=>"re"],
],
]
])
]);
}
function support(){
    
    global $chat_id;
    global $reply_kb_options_back;
    global $conn;
    
    mysqli_query($conn,"UPDATE `users` SET `step`='support' WHERE id='$chat_id' LIMIT 1");
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"???? ???????? ?????? ???? ?????????? ????????",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_back),
]);
}
function statistics(){
    
    global $chat_id;
    global $conn;
    
$sql    = "SELECT * FROM `users`";
$result = mysqli_query($conn,$sql);
$res    = mysqli_num_rows($result);

bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"???? ???????? ???????? ??????",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
    ['text'=>"???? ???????? ??????????????",'callback_data'=>"ssss"],
    ['text'=>"$res",'callback_data'=>"ssss"],
],
]
])
]);
}
function panel(){
    
    global $reply_kb_options_panel;
    global $admin;

bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"??????????? ???? ?????? ???????????? ?????? ??????????",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_panel),
]);
}
function key_hmgani(){
    
    global $admin;
    global $conn;
    global $reply_kb_options_back;
    
    bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"???? ???????? ?????? ???? ??????????????",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_back),
]);

mysqli_query($conn,"UPDATE `users` SET `step`='key_hmgani' WHERE id='$admin' LIMIT 1");
}
function key_forvard(){
    
    global $admin;
    global $conn;
    global $reply_kb_options_back;
    
    bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"???? ???????? ?????? ???? ?????????????? ????????",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_back),
]);

mysqli_query($conn,"UPDATE `users` SET `step`='key_forvard' WHERE id='$admin' LIMIT 1");
}
function suppprt_result(){
    
    global $chat_id;
    global $reply_kb_options_back;
    global $conn;
    
    mysqli_query($conn,"UPDATE `users` SET `step`='suppprt_result' WHERE id='$chat_id' LIMIT 1");
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"???? ???????????? ???? ?????????? ???????? ???????? ???????????? ???????? ???? ???? ???????? ?????? ??????????
id,message",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_back),
]);
}
function send_coin(){
    
    global $chat_id;
    global $reply_kb_options_back;
    global $conn;
    
    mysqli_query($conn,"UPDATE `users` SET `step`='send_coin' WHERE id='$chat_id' LIMIT 1");
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"???? ???????? ???????? ?? ???????????? ???? ???????????? ?????????? ???????? ???? ???? ???????? ?????? ??????????????
id,coin",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_back),
]);
}
function sendnot_coin(){
    
    global $chat_id;
    global $reply_kb_options_back;
    global $conn;
    
    mysqli_query($conn,"UPDATE `users` SET `step`='sendnot_coin' WHERE id='$chat_id' LIMIT 1");
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"???? ???????? ???????? ?? ???????????? ???? ???????????? ?????? ???????? ???? ???? ???????? ?????? ??????????????
id,coin",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_back),
]);
}
function back(){
    
    global $reply_kb_options;
    global $chat_id;

bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"?????? ???? ?????? ???????? ??????????????",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options),
]);
}
function ref_ok(){
    
    global $chat_id;
    global $conn;
    global $reply_kb_options_back;
    
    $ref = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `refid` FROM `users` WHERE `id`=$chat_id LIMIT 1"));
    if($ref['refid'] != 1){
        
        bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"??? ?????? ???? ?????? ???????? ?????????? ?????? ???????? ??????",
'parse_mode'=>"HTML",
]);
    }
    else{
        mysqli_query($conn,"UPDATE `users` SET `step`='ref_ok' WHERE id='$chat_id' LIMIT 1");
        
        bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"???? ???????? ???????? ?????????? ?????? ???? ??????????????

???? ?????? ?????? ???? ?????? ???? ???????? ?????????? ???????? $co_re ?????????? ??????????????????",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_back),
]);
    }
}


?>