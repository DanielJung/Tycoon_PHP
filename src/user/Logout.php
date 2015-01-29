<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Logout
 *
 * @author daniel
 */

namespace user;

require_once __DIR__ . '/../SiteInterface.php';

class Logout extends \ui\SiteInterface {
    public function getContent($oUser) {
        $sContent = "";
        if(!$oUser->isLoggedIn()) {
            $sContent .= "<p> You are not logged in. </p>";
        } else {
            try {
                $oUser->Logout();
            } catch (\Exception $ex) {

            }
            setcookie('userid', null, -1, "/");
            setcookie('hash', null, -1,"/");
            $sContent .= "<p> You have been logged out. </p>";
        }
        return $sContent;
    }
}