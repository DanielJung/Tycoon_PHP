<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Forum
 *
 * @author daniel
 */

namespace forum;

require_once __DIR__ . '/../SiteInterface.php';
require_once __DIR__ . '/../CPPInterface.php';
require_once __DIR__ . '/Topic.php';

class Forum extends \ui\SiteInterface {
    public function getContent($oUser) {
        $sContent = "";
        //show single forum
        if(isset($_GET['forumid'])) {
            $oResult = json_decode(\CPPInterface::getCPPResult("forum", 
                    array("forumid" => $_GET['forumid'])), true);
            if(isset($oResult["error"])) {
                return "Error: " . $oResult["error"];
            }
            $sContent .= self::getForumContent($oResult["forumid"], $oResult["name"], 
                        $oResult["description"], $oResult["topics"]);
            
        } else { //shwo all forums
            $aResult = json_decode(\CPPInterface::getCPPResult("forum", array()), true);
            if(isset($oResult["error"])) {
                return "Error: " . $oResult["error"];
            }
            foreach($aResult as $oForum) {
                $sContent .= self::getForumContent($oForum["forumid"], $oForum["name"], 
                        $oForum["description"], $oForum["topics"]);
            }            
        }
        return $sContent;
    }
    
    public static function getForumContent($iID, $sName, $sDescription, $aTopics) {
        $sContent = "";
        $sContent .= "<article style=\"border-style:solid; border-width:thin\">";
        $sContent .= "<a href=\"/Tycoon_PHP/forum/index.php?forumid=" . $iID . "\">";
        $sContent .= "<h2>" . $sName . "</h2>";
        $sContent .= "</a>";
        $sContent .= "<p>" . $sDescription . "</p>";
        if(count($aTopics)>0) {
            $sContent .= "<ul>";
            foreach($aTopics as $oTopic) {
                $sContent .= "<li>";
                $sContent .= "<h3>" . Topic::getTopicContent($oTopic["topicid"], $oTopic["name"], 
                        $oTopic["description"], array()) . "</h3>";
                $sContent .= "<p>" . $oTopic["description"] . "</p>";
                $sContent .= "</li>";
            }
            $sContent .= "</ul>";
        }
        $sContent .= "</article>";
        return $sContent;
    }
}
