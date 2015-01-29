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

class Forum extends \ui\SiteInterface {
    public function getContent($oUser) {
        $sContent = "";
        //show single forum
        if(isset($_GET['id'])) {
            
        } else { //shwo all forums
            $oResult = json_decode(\CPPInterface::getCPPResult("forum", array()), true);
            $aForums = $oResult["forum"];
            $sContent.= "<ul style=\"list-style:none;\">";
            foreach($aForums as $oForum) {
                $sContent .= "<li>";
                $sContent .= $this->getForumContent($oForum["forumid"], 
                        $oForum["name"], $oForum["description"]);
                $sContent .= "</li>";
            }
            $sContent .= "</ul>";
        }
        return $sContent;
    }
    
    public function getForumContent($sForumID, $sForumName, $sForumDescription) {
        $sContent = "";
        
        $sContent .= "<h1>" . $sForumName . "</h1>";
        $sContent .= "<p>" . $sForumDescription . "</p>";
        
        return $sContent;
    }
}
