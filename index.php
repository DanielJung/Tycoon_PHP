<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        require_once __DIR__ . '/src/Home.php';
        require_once __DIR__ . '/src/Homepage.php';
        
        $oHome = new Home();
        
        $oHomepage = new ui\Homepage($oHome);
        
        echo $oHomepage->getContent();
        ?>
</html>
