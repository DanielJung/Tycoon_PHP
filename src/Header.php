<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Header
 *
 * @author daniel
 */

namespace ui;

require_once __DIR__ . '/SiteInterface.php';

class Header extends SiteInterface {
    public function getContent($oUser) {
        $sContent = "";
        $sContent .= "Header\n";
        return $sContent;
    }
}
