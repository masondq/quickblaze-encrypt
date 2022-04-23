<?php
function translate($q, $sl, $tl){
    $res= file_get_contents("https://translate.googleapis.com/translate_a/single?client=gtx&ie=UTF-8&oe=UTF-8&dt=bd&dt=ex&dt=ld&dt=md&dt=qca&dt=rw&dt=rm&dt=ss&dt=t&dt=at&sl=".$sl."&tl=".$tl."&hl=hl&q=".urlencode($q), $_SERVER['DOCUMENT_ROOT']."/transes.html");
    $res=json_decode($res);
    return $res[0][0][0];
}
function getBrowserLang(){
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    $acceptLang = ['fr', 'it', 'en']; 
    $lang = in_array($lang, $acceptLang) ? $lang : 'en';
    return $lang;
}
echo translate($_GET["text"], "en", getBrowserLang());
echo "<Br>";
echo getBrowserLang();