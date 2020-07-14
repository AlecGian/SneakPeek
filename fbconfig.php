<?php

    require_once './vendor/autoload.php';

    if(!session_id()){
        session_start();
    }


    $facebook = new \Facebook\Facebook([
        'app_id'                => '2338005006507564',
        'app_secret'            => '57bbbb18d19f59d451890736ef3aaf8f',
        'default_graph_version' => 'v7.0'

    ]);


    $facebook_output = '';

    $facebook_helper = $facebook->getRedirectLoginHelper();

    if(isset($_GET['code'])){
        if(isset($_GET['access_token'])){
            $access_token = $_SESSION['access_token'];
        }else{
            $access_token = $facebook_helper->getAccessToken();
        
            $_SESSION['access_token'] = $access_token;

            $facebook->setDefaultAccessToken($_SESSION['access_token']);
        }
        $graph_response = $facebook->get("/me?fields=name, email", $access_token);

        $facebook_user_info = $graph_response->getGraphUser();

        if(!empty($facebook_user_info['id'])){
            $_SESSION['user_image'] = 'http://graph.facebook.com/'.$facebook_user_info['id'].'/picture';
        }
        if(!empty($facebook_user_info['name'])){
            $_SESSION['user_name'] = $facebook_user_info['name'];
        }

        if(!empty($facebook_user_info['email'])){
                $_SESSION['user_email_address'] = $facebook_user_info['email'];
        }
    }else{
        $facebook_permissions = ['email'];

        $facebook_login_url = $facebook_helper->getLoginUrl('http://localhost/SneakPeek.php', $facebook_permissions);


        
    }


?>