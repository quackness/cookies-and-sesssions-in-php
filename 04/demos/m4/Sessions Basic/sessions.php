<?php

// Initializing a session:

session_start();

$_SESSION['username'] = 'Anna';
echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Not Available';


// $_SESSION['name'] = 'Lyra';
// echo isset($_SESSION['name']) ? $_SESSION['name'] : 'Not Available';

echo "\n";

$_SESSION = [];
$ses_params = session_get_cookie_params();
print_r($options = array(
    'lifetime' => time()-60,
    'path'     => $ses_params['path'],
    'domain'   => $ses_params['domain'],
    'secure'   => $ses_params['secure'],
    'httponly' => $ses_params['httponly'],
    'samesite' => $ses_params['samesite']));

  
setcookie(session_name(), '', $options);
//destroys session from the server but not from the session data that is why you can still see in the browser
session_destroy();

echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Not Available';