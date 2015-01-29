<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Homepage
 *
 * @author daniel
 */

namespace ui;

require_once __DIR__ . '/SiteInterface.php';

require_once __DIR__ . '/Navigation.php';
require_once __DIR__ . '/Header.php';
require_once __DIR__ . '/Footer.php';
require_once __DIR__ . '/Newsfeed.php';
require_once __DIR__ . '/UserInfo.php';

require_once __DIR__ . '/user/User.php';

class Homepage {
    private $moSite;
    private $moNavigation;
    private $moHeader;
    private $moFooter;
    private $moNewsfeed;
    private $moUserInfo;
    
    private $moUser;
    
    public function __construct($oSite) {
        $this->moUser = new \User();
        if(isset($_COOKIE['userid']) && isset($_COOKIE['hash'])) {
            try {
                $this->moUser->AutoLogin($_COOKIE['userid'], $_COOKIE['hash']);
            } catch (\Exception $ex) {
            }
        }
        $this->moSite = $oSite;
        $this->moNavigation = new Navigation($this->moUser);
        $this->moHeader     = new Header($this->moUser);
        $this->moFooter     = new Footer($this->moUser);
        $this->moNewsfeed   = new Newsfeed($this->moUser);
        $this->moUserInfo   = new UserInfo($this->moUser);
    }
    
    public function getContent() {
        $sContent = "";
        $sContent .= "<head>";
        $sContent .= "    <meta charset=\"UTF-8\">    ";
        $sContent .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"/Tycoon_PHP/src/homepage.css\">";
        $sContent .= "    <title>";
        $sContent .= $this->moSite->getTitle();
        $sContent .=      "</title>   ";
        $sContent .= "</head>";
        
        $sContent .= "<body>";
        $sContent .= "<div class=\"wrapper\">";
        $sContent .= "<header class=\"header\">" . $this->moHeader->getContent($this->moUser) . "</header>";
        
        $sContent .= "<nav class=\"Navigation\">" . $this->moNavigation->getContent($this->moUser) . "</nav>";
        
        $sContent .= "<article class=\"main\">";
        $sContent .= "" . $this->moSite->getContent($this->moUser) . "";
        $sContent .= "</article>";
        
        $sContent .= "<aside class=\"aside aside-1\">";
        $sContent .= "<div class=\"UserInfo\">" . $this->moUserInfo->getContent($this->moUser) . "</div>";
        $sContent .= "<div class=\"Newsfeed\"> " . $this->moNewsfeed->getContent($this->moUser) . "</div>";
        $sContent .= "</aside>";
        
        $sContent .= "<footer class=\"footer\">" . $this->moFooter->getContent($this->moUser) . "</footer>";
        $sContent .= "</div>";
        $sContent .= "</body>";
        return $sContent;
    }
}
