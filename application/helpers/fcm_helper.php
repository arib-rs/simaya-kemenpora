<?php 
    function pushFcm($title = "", $body = "", $topic = "", $clickaction = "", $customData){
        $server_key = "AAAA83D9lUY:APA91bFQZfEHyxZ1MNnn8H8QFG7gLdagjv8a9ZtlgSavTi6ardk8fg_TjIyJYAjCUUPqcar2Wb_jgnp-1sy9a61bGuLW825iX9qpBGW2Ls5dOhYqPNMJOldWy1mzbMnBVEqZ832JdFYX";
        $customData['pushFcm'] = '1';

        ini_set('display_errors', 'On');

        $fields = array(
            'priority' => 'high',
            'android' => array(
                'priority' => 'high'
            ),
            'to' => '/topics/' . $topic,
            'notification' => array(
                'body' => $body,
                'title' => $title,
                'click_action' => $clickaction,
                'icon' => 'logo_fcm'
            ),
            'data' => $customData
        );

        // pake click action untuk handle app yg di background
        // pada field 'data' yang akan terkirim ke app walaupun app ada pada background
        // Bundle bundle = getIntent().getExtras();
        // if (bundle != null) {
            //bundle must contain all info sent in "data" field of the notification
        // }
        
        // Set POST variables
        $url = 'https://fcm.googleapis.com/fcm/send';
        
        $headers = array(
            'Authorization: key=' . $server_key,
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();
 
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
 
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
 
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            echo 'Curl failed: ' . curl_error($ch);
        }
 
        // Close connection
        curl_close($ch);

    }
?>