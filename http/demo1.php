<?php
        $headers = array("Content-Type" => "Application/json");
        $url = 'http://www.demo.com';
        $result = array(
            'account_id'         => 2,
            'token'              => 'b0ff5ccb0c408e4f9e8bcd72bd965457',
            'alert_id'           => 45
        );
        $data = json_encode($result);

        $rest     = new RestClient();
        $info     = $rest->make('post',$url,$data,$headers);

        if($info->getStatus() != 200){
            echo '失败了';
        }
        $response   = $info->getResponse();
