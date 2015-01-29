<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Register
 *
 * @author daniel
 */

namespace user;

require_once __DIR__ . '/../SiteInterface.php';

class Register extends \ui\SiteInterface {
    public function getContent($oUser) {
        $sContent = "";
        
        if($oUser->isLoggedIn()) {
            $sContent .= "<p>You are already logged in.</p>";
        } else {
            //handle Registration
            if(sizeof($_POST) && isset($_POST['email']) && isset($_POST['password']) 
                    && isset($_POST['passwordrpt'])) {
                $oUser = new \User();
                try {
                    $sContent .= "<p>";
                    $sContent .= $oUser->Register($_POST['email'], $_POST['password'], $_POST['passwordrpt']);
                    $sContent .= "</p>";
                    
                } catch (\Exception $ex) {
                    $sContent .= "<p>";
                    $sContent .= $ex->getMessage();
                    $sContent .= "</p>";
                }
            } else {  //Show Register-Formular
                $sContent .= "<form action=\"register.php\" method=\"post\">";
                $sContent .= "<p>E-Mail:<br><input name=\"email\" type=\"email\"></p>";
                $sContent .= "<p>Passwort:<br><input name=\"password\" type=\"password\" ></p>";
                $sContent .= "<p>Passwort Wdh:<br><input name=\"passwordrpt\" type=\"password\" ></p>";
                $sContent .= "<input type=\"submit\" value=\"Registrieren\">";
                $sContent .= "<input type=\"reset\" value=\"Abbrechen\">";
                $sContent .= "</form>";
            }
        }
        
        return $sContent;
    }
}
