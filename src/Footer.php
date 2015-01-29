<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Footer
 *
 * @author daniel
 */

namespace ui;

require_once __DIR__ . '/SiteInterface.php';

class Footer extends SiteInterface {
    public function getContent($oUser) {
        $sContent = "";
        $sContent .= "Footer\n";
        return $sContent;
    }
}
