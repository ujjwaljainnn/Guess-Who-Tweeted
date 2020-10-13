<?php

    //using the OAuth, twitteroauth, and TwitterAPIExchange files from Abraham
    require_once('./include/OAuth.php');
    require_once('./include/TwitterAPIExchange.php');
    require_once('./include/twitteroauth.php');

    require_once('./include/config.php');

    $requestMethod = 'GET';

    $settings = array(
        'consumer_key' => '',
        'consumer_secret' => '',
        'oauth_access_token' => '',
        'oauth_access_token_secret' => '',
    );

    $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
    $twitter = new TwitterAPIExchange($settings);

?>