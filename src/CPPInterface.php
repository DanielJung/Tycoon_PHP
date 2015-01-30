<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CPPInterface
 *
 * @author daniel
 */
class CPPInterface {
    private static $msServer = "http://localhost:8080/master";
    public static function getCPPResult($sUrl, $aData, $sMethod = 'POST') {
        $url = self::$msServer . '/' . $sUrl;
        $data = $aData;
        
        // use key 'http' even if you send the request to https://...
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => $sMethod,
                'content' => http_build_query($data),
            ),
        );
        $context  = stream_context_create($options);
        $oResult = file_get_contents($url, false, $context);
        if(!$oResult) {
            echo "Communication with Webservice failed";
            exit();
        }
        return $oResult;
    }
}
