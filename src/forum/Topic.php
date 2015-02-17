<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Topic
 *
 * @author daniel
 */

namespace forum;

require_once __DIR__ . '/../SiteInterface.php';
require_once __DIR__ . '/../CPPInterface.php';

class Topic extends \ui\SiteInterface {
    public function getContent($oUser) {
        $sContent = "";
        
        if(isset($_GET['topicid'])) {
            $oResult = json_decode(\CPPInterface::getCPPResult("forum/topic", 
                    array("topicid" => $_GET['topicid'])), true);
            if(isset($oResult["error"])) {
                return "Error: " . $oResult["error"];
            }
            $sContent .= self::getTopicContent($oResult["topicid"], $oResult["name"], 
                        $oResult["description"], $oResult["articles"]);
        } else if(isset($_GET['forumid'])) {
            $aResult = json_decode(\CPPInterface::getCPPResult("forum/topic", 
                    array("forumid" => $_GET['forumid'])), true);
            if(isset($oResult["error"])) {
                return "Error: " . $oResult["error"];
            }
            foreach($aResult as $oTopic) {
                $sContent .= self::getTopicContent($oTopic["topicid"], $oTopic["name"], 
                        $oTopic["description"], $oTopic["articles"]);
            }       
        } else {
            return "Error: No Forum or Topic-ID set";
        }
        
        return $sContent;
    }
    
    public static function getTopicContent($iTopicID, $sName, $sDescription, $aArticles) {
        $sContent = "";
        
        $sContent .= "<a href=\"/Tycoon_PHP/forum/topic.php?topicid=" . $iTopicID . "\">";
        $sContent .= "<h3>" . $sName . "</h3>";
        $sContent .= "</a>";
        $sContent .= "<p>" . $sDescription . "</p>";
        
        if(count($aArticles)>0) {
            $sContent .= "<ul>";
            foreach($aArticles as $oArticle) {
                $sContent .= "<li>";
                $sContent .= "<h3>" . $oArticle["caption"] . "</h3>";
                $sContent .= "</li>";
            }
            $sContent .= "</ul>";
        }
        
        return $sContent;
    }
}