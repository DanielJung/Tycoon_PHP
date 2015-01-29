<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Activate
 *
 * @author daniel
 */

namespace user;

require_once __DIR__ . '/../SiteInterface.php';

class Activate extends \ui\SiteInterface {
    public function getContent($oUser) {
        $sContent = "";
        
        if($oUser->isLoggedIn()) {
            $sContent .= "<p>You are already logged in.</p>";
        } else {
            if(sizeof($_GET) && isset($_GET['code'])) {
                try {
                    $sContent .= "<p>";
                    $sContent .= $oUser->Activate($_GET['code']);
                    $sContent .= "</p>";
                } catch (\Exception $ex) {
                    $sContent .= "<p>";
                    $sContent .= $ex->getMessage();
                    $sContent .= "</p>";
                }
            } else {
                $sContent .= "<form action=\"/Tycoon_PHP/user/activate.php\" method=\"get\">";
                $sContent .= "<p>Aktivierungscode:<br><input name=\"code\"></p>";
                $sContent .= "<input type=\"submit\" value=\"Aktivieren\">";
                $sContent .= "<input type=\"reset\" value=\"Abbrechen\">";
                $sContent .= "</form>";
            }
        }
        
        return $sContent;
    }
}

