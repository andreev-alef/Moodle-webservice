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
        <style>
            body{
                /*font-family: sans-serif;*/
            }

        </style>    
    </head>
    <body>
        <?php
        ini_set('error_reporting', E_ALL);
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);

        function getRandomPassword($passLen = 12) {
            $symbols = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%&?';
            $pass = '';
            $alphaLength = strlen($symbols) - 1;
            for ($i = 0; $i < $passLen; $i++) {
                $n = rand(0, $alphaLength);
                $pass = $pass . $symbols[$n];
            }
            return $pass;
        }

        $pwd = getRandomPassword(12);
        ?>
        <div style="font-family: 'Courier New'; font-size: 14pt; text-align: center">
            <tt><?= $pwd ?></tt>
        </div>
    </body>
</html>
