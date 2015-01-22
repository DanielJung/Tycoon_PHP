<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once './CPPInterface.php';
        
            if(sizeof($_POST)) {
                $aData = array('email' => $_POST['email'],
                    'password' => $_POST['password'],
                    'passwordrep' => $_POST['passwordrep']);
                $result = CPPInterface::getCPPResult('user/register', $aData);
                var_dump($result);
            } else {
                echo "<form action=\"register.php\" method=\"post\">
                <p>E-Mail:<br><input name=\"email\" type=\"email\"></p>
                <p>Passwort:<br><input name=\"password\" type=\"password\" ></p>
                <p>Passwort wiederholen:<br><input name=\"passwordrep\" type=\"password\" ></p>
                <input type=\"submit\" value=\"Registrieren\">
                <input type=\"reset\" value=\"Abbrechen\">
                </form>";
            }
        ?>
    </body>
</html>
