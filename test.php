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
        ini_set('error_reporting', E_ALL);
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);

        class Users {

            public $name = '';
            public $surname = '';
            public $patronymic = '';

        }

        $users[] = new Users;
        $users[0]->name = "Александр";
        $users[1]->name = "Helga";
        ?>
        <p><?= count($users) ?>
            <?php for ($i = 0; $i < count($users); $i++): ?>
            <p><?= $users[$i]->name ?>
            <?php endfor; ?>
    </body>
</html>
