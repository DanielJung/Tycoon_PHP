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
        require_once '../src/user/Logout.php';
        require_once '../src/Homepage.php';
        
        $oForum = new user\Logout();
        
        $oHomepage = new ui\Homepage($oForum);
        
        echo $oHomepage->getContent();
        ?>
</html>