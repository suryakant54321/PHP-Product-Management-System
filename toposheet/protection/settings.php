<?php

// Administrator password
define('ADMIN_PASSWORD', 'WfdRt7');

################ LOGIN FORM SETTINGS ################

// users list file.
define('USERS_LIST_FILE', 'users.php');

// request login? true - show login and password boxes, false - password box only
define('USE_USERNAME', true);

// User will be redirected to this page after logout
define('LOGOUT_URL', '../issue_submit.php');

// time out after NN minutes of inactivity. Set to 0 to not timeout
define('TIMEOUT_MINUTES', 0);

// This parameter is only useful when TIMEOUT_MINUTES is not zero
// true - timeout time from last activity, false - timeout time from login
define('TIMEOUT_CHECK_ACTIVITY', true);

// This will be added as prefix to Redirect URL in User Management
// Would be usefull if redirect URLs start from the same string, as you do not need to type it all the time.
// Redirect URLs in User Management which starts with "http" string will not be prefixed
// Set to '' if you do not need it.
define('REDIRECT_PREFIX', '');

################ SIGNUP FORM SETTINGS ################

################ REMINDER FORM SETTINGS ################


?>