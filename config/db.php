<?php
$dbconfig = Array(
  'prefix'  => 'pgsql',
  'dbhost'  => 'localhost',
  'dbport'  => '5432',
  'dbname'  => 'cs313-php',
  'dbuser'  => '',
  'dbpass'  => ''
);

$dburl = getenv('DATABASE_URL');

if (!empty($dburl)) {
  $herokuconfig = parse_url($dburl);
  $dbconfig['dbhost'] = $herokuconfig['host'];
  $dbconfig['dbport'] = $herokuconfig['port'];
  $dbconfig['dbname'] = ltrim($herokuconfig['path'], '/');
  $dbconfig['dbuser'] = $herokuconfig['user'];
  $dbconfig['dbpass'] = $herokuconfig['pass'];
}
