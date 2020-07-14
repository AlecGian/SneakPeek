<?php

require_once 'GoogleAPI/vendor/autoload.php';
$gClient = new Google_Client();
$gClient->setClientId("213578737376-mh6a4iuefg1f5dajintjtcq454tldfhi.apps.googleusercontent.com");
$gClient->setClientSecret("oSi9y3O27n7eihQQNaD-V1Rc");
$gClient->setApplicationName("Sneak Peek");
$gClient->setRedirectUri("http://localhost/callback.php");
$gClient->addScope("https://www.googleapis.com/auth/userinfo.email");
$gClient->addScope("https://www.googleapis.com/auth/userinfo.profile");


?>