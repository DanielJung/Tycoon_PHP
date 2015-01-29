<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Game
 *
 * @author daniel
 */

namespace game;

require_once __DIR__ . '/../SiteInterface.php';

class Game extends \ui\SiteInterface {
    public function getContent($oUser) {
        return "Content for Game";
    }
}
