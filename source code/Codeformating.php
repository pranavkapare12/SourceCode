<?php
// session_start();
// change code format with respect to the file
function changestring($a, $b) {
    $filename="abc1.php";
    $fp=fopen($filename,"r");
    while(($a=fgets($fp))!=NULL){
        $a = str_replace("<", "&lt;", $a);
        $a = str_replace(">", "&gt;", $a);
        $a = str_replace("$", "\$", $a);
        $a = str_replace("&lt;br&gt;","&lt;br&gt;<br>",$a);
        echo "<pre><code>$a</code></pre>";        
    }
}

// change code format with respect to the text area
function changehtmltag($a){
    $a = str_replace("<", "&lt;", $a);
    $a = str_replace(">", "&gt;", $a);
    $a = str_replace("$", "\$", $a);
    $a = str_replace("&lt;br&gt;","&lt;br&gt;<br>",$a);
}

function changetag($a){
    $a = str_replace("<", "&lt;", $a);
    $a = str_replace(">", "&gt;", $a);
    $a = str_replace("$", "\$", $a);
}

function sessionwork(){
    session_start();
}

function posgres(){
    $connection = pg_connect("host=localhost dbname=sourcecode user=postgres password=Pranav@123");
    return $connection;
}
?>