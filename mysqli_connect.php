<?php

define('DB_USER', 'be119c2961b98f');
define('DB_PASSWORD', '6ec874c8');
define('DB_HOST', 'us-cdbr-iron-east-02.cleardb.net');
define('DB_NAME', 'heroku_2e4b2e80208a4da');

$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );

mysqli_set_charset($dbc, 'utf8');

?>

<!-- mysql://be119c2961b98f:6ec874c8@us-cdbr-iron-east-02.cleardb.net/heroku_2e4b2e80208a4da?reconnect=true

be119c2961b98f
6ec874c8
us-cdbr-iron-east-02.cleardb.net

heroku_2e4b2e80208a4da?reconnect=true
heroku config:set DATABASE_URL='mysql://username:password@hostname/database_name?reconnect=true'
mysql forum -u Admin -p Admin sql.sql -->