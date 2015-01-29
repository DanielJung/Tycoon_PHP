<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserInfo
 *
 * @author daniel
 */

namespace ui;

require_once __DIR__ . '/SiteInterface.php';

class UserInfo extends SiteInterface {
    public function getContent($oUser) {
        $sContent = "";
        if($oUser->isLoggedIn()) {
            $sContent .= "<p>You are logged in as " . $oUser->getEmail() . "</p>";
            $sContent .= "<p><a href=\"/Tycoon_PHP/user/logout.php\">Logout</a></p>";
        } else {
            $sContent .= "<p><a href=\"/Tycoon_PHP/user/login.php\">Login</a></p>";
            $sContent .= "<p><a href=\"/Tycoon_PHP/user/register.php\">Registrieren</a></p>";
        }
        return $sContent;
    }
}
