<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Newsfeed
 *
 * @author daniel
 */

namespace news;

require_once __DIR__ . '/../SiteInterface.php';

class News extends \ui\SiteInterface {
    public function getContent($oUser) {
        $sContent = "";
        
        if(isset($_GET["articleid"])) {  //show specific article
            
        } else {  //show all articles
            $oResult = json_decode(\CPPInterface::getCPPResult("news", array()), true);
            
            if(isset($oResult["error"])) {
                return "Error: " . $oResult["error"];
            }
            
            foreach($oResult as $oArticle) {
                $sContent .= "<article>";
                $sContent .= "<h2>" . $oArticle["title"] . "</h2>";
                $sContent .= "<p>" . $oArticle["text"] . "</p>";
                $sContent .= "<p>" . $oArticle["timestamp"] . "</p>";
                $sContent .= "</article>";
            }
        }
        
        return $sContent;
    }
}
