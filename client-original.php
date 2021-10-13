<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

function getRandomPassword($passLen = 12) {
    $symbols = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%&?';
    $numbers = '1234567890';
    $pass = '';
    $symLength = strlen($symbols) - 1;
    $numLength = strlen($numbers) - 1;
    for ($i = 0; $i < $passLen; $i++) {
        $n_s = rand(0, $symLength);
        $pass = $pass . $symbols[$n_s];
    }
    $n_n = rand(0, $numLength);
    $pass = $pass . $numbers[$n_n];
    return $pass;
}

// This file is NOT a part of Moodle - http://moodle.org/
/**
 * REST client for Moodle
 * Return JSON or XML format
 *
 * @authorr Jerome Mouneyrac
 */
/// SETUP - NEED TO BE CHANGED
$token = '7438c75e1f45e84c34b6fbc52c39ac83';
$domainname = 'http://127.0.0.1/moodle';
$functionname = 'core_user_create_users';
$user_email = 'alef-photoamator@yandex.ru';

// REST RETURNED VALUES FORMAT
$restformat = 'json'; //Also possible in Moodle 2.2 and later: 'json'
//$restformat = 'xml'; //Also possible in Moodle 2.2 and later: 'json'
//Setting it to 'json' will fail all calls on earlier Moodle version
//////// moodle_user_create_users ////////
/// PARAMETERS - NEED TO BE CHANGED IF YOU CALL A DIFFERENT FUNCTION
$user1 = new stdClass();
$user1->username = strtolower($user_email);
$user1->password = getRandomPassword();
$user1->firstname = 'Александр';
$user1->lastname = 'Андреев';
$user1->email = strtolower($user_email);
$user1->auth = 'manual';
//        $user1->idnumber = 'testidnumber1';
//        $user1->lang = 'ru';
//        $user1->theme = 'standard';
$user1->timezone = 'Europe/Moscow';
//        $user1->mailformat = 0;
$user1->description = 'Автогенерация';
$user1->city = 'Кемерово';
$user1->country = 'RU';
//        $preferencename1 = 'preference1';
//        $preferencename2 = 'preference2';
$user1->preferences = array(array('type' => 'auth_forcepasswordchange', 'value' => true));
$users = array($user1);
$params = array('users' => $users);

/// REST CALL
//header('Content-Type: text/plain');
$serverurl = $domainname . '/webservice/rest/server.php'
        . '?wstoken=' . $token
        . '&wsfunction=' . $functionname;
require_once('./curl.php');
$curl = new curl;
//if rest format == 'xml', then we do not add the param for backward compatibility with Moodle < 2.2
$restformat = ($restformat == 'json') ? '&moodlewsrestformat=' . $restformat : '';
$resp = $curl->post($serverurl . $restformat, $params);
$resp_decode = json_decode($resp, false);
print_r("<p>".$resp_decode->errorcode);
print_r("<p>".$resp_decode->message);
print_r("<p>".$user1->password);
?>
