<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author daniel
 */

namespace user;

require_once __DIR__ . '/../SiteInterface.php';

class Login extends \ui\SiteInterface {
    public function getContent($oUser) {
        $sContent = "";
        
        if($oUser->isLoggedIn()) {
            $sContent .= "<p>You are already logged in.</p>";
        } else {
            //handle login
             if(sizeof($_POST) && isset($_POST['email']) && isset($_POST['password'])) {
                try {
                    $sContent .= "<p>";
                    $sContent .= $oUser->ManualLogin($_POST['email'], $_POST['password']);
                    $sContent .= "</p>";
                    setcookie('userid', $oUser->getID(), time()+60*60*24*30, "/");
                    setcookie('hash', $oUser->getHash(), time()+60*60*24*30, "/");
                } catch (\Exception $ex) {
                    $sContent .= "<p>";
                    $sContent .= $ex->getMessage();
                    $sContent .= "</p>";
                }
            } else {  //Show Login-Formular
                $sContent .= "<form action=\"login.php\" method=\"post\">";
                $sContent .= "<p>E-Mail:<br><input name=\"email\" type=\"email\"></p>";
                $sContent .= "<p>Passwort:<br><input name=\"password\" type=\"password\" ></p>";
                $sContent .= "<input type=\"submit\" value=\"Login\">";
                $sContent .= "<input type=\"reset\" value=\"Abbrechen\">";
                $sContent .= "</form>";
            }
        }
        
        return $sContent;
    }
}
