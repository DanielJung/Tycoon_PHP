<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SiteInterface
 *
 * @author daniel
 */

namespace ui;

abstract class SiteInterface {
    public abstract function getContent($oUser);
    public function getTitle() {
        return "";
    }
}
