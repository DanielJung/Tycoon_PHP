<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Profile
 *
 * @author daniel
 */

namespace user;

require_once __DIR__ . '/../SiteInterface.php';

class Profile extends \ui\SiteInterface {
    public function getContent($oUser) {
        $sContent = "";
        
        if(isset($_GET["userid"])) {  //öffentliches Profil
            $aResult = $oUser->getPublicProfile($_GET["userid"]);
            if(isset($aResult["error"])) {
                return "Error: " . $aResult["error"];
            }
            $sContent .= "<table>";
            $sContent .= "<tr><td>Nickname</td><td>" . $aResult["nick"] . "</td></tr>";
            $sContent .= "<tr><td>Geschlecht</td><td>" . $aResult["gender"] . "</td></tr>";
            $sContent .= "<tr><td>Alter</td><td>" . $aResult["age"] . "</td></tr>";
            $sContent .= "<tr><td>Website</td><td>" . $aResult["website"] . "</td></tr>";
            $sContent .= "</table>";
        } else {  //privates profil
            $aResult = $oUser->getPrivateProfile($_POST["name"], $_POST["nick"], $_POST["gender"],
                    $_POST["age"], $_POST["home"], $_POST["website"]);
            if(isset($aResult["error"])) {
                return "Error: " . $aResult["error"];
            }
            $sContent .= "<form action=\"profile.php\" method=\"post\">";
            $sContent .= "<p>Name:<br><input name=\"name\" value=\"" . $aResult["name"] . "\"></p>";
            $sContent .= "<p>Nickname:<br><input name=\"nick\" value=\"" . $aResult["nick"] . "\"></p>";
            $sContent .= "<p>Geschlecht:<br><input name=\"gender\" value=\"" . $aResult["gender"] . "\"></p>";
            $sContent .= "<p>Alter:<br><input name=\"age\" value=\"" . $aResult["age"] . "\"></p>";
            $sContent .= "<p>Wohnort:<br><input name=\"home\" value=\"" . $aResult["home"] . "\"></p>";
            $sContent .= "<p>Website:<br><input name=\"website\" value=\"" . $aResult["website"] . "\"></p>";
            $sContent .= "<input type=\"submit\" value=\"Speichern\">";
            $sContent .= "<input type=\"reset\" value=\"Abbrechen\">";
            $sContent .= "</form>";
        }
        
        return $sContent;
    }
}