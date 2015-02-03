<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Navigation
 *
 * @author daniel
 */

namespace ui;

require_once __DIR__ . '/SiteInterface.php';

class Navigation extends SiteInterface {
    public function getContent($oUser) {
        $sContent = "";
        $sContent .= "<a href=\"/Tycoon_PHP/\">Home</a>\n";
        $sContent .= "<a href=\"/Tycoon_PHP/forum/\">Forum</a>\n";
        $sContent .= "<a href=\"/Tycoon_PHP/game/\">Game</a>\n";
        $sContent .= "<a href=\"/Tycoon_PHP/news/\">News</a>\n";
        return $sContent;
    }
}
