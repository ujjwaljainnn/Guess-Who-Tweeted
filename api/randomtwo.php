<?php

      
    function fetchTweets($username){
        require './include/config.php'; 
        /**
         * The user specifc url arguments for elon musk 
         * 
         * exclude_replies - true means that the fetched JSON object would
         * not include replies from the users' timeline
         * 
         * tweet_mode - twitter default tweet length using the api is 200 characters
         * and to fetch the full tweet, we need to use this property and set it to
         * extended and then use 'full_text' instead of 'text' to fetch the text of the
         * tweet 
         */
        $getfield = '?screen_name='. $username .'&count=3200&exclude_replies=true&trim_user=true&include_rts=false&tweet_mode=extended';

        /**
         * The statement below fetches the data using twitter API in a 
         * JSON format and then we convert that JSON format data into 
         * array format data using json_decode()
         */
        $response = json_decode($twitter -> setGetField($getfield)
                            -> buildOauth($url, $requestMethod)
                            -> performRequest(), $assoc=TRUE);

        /**
         * filtered_elon contains only those tweets texts which fulfill our 
         * conditions
         * is_quote_status - whether a tweet is a quote tweet or not
         * retweeted - whether a tweet is a retweet or not
         * ['entities']['user_mentions'] - the array of accounts tagged in the tweet
         * ['entities']['media'] - the array that contains the media attached in the tweet
         * ['entitites']['urls'] - the array that contains the links included in the tweet
         */
        $filtered = array();
        foreach($response as $key){
            if($key['is_quote_status'] && !$key['retweeted'] && empty($key['entities']['user_mentions'])
            && !isset($key['entities']['media']) && empty ($key['entities']['media']) 
            && empty($key['entitites']['urls'])){
                array_push($filtered, $key['full_text']);
            }
        }
        return $filtered;
    }
        
    
?>