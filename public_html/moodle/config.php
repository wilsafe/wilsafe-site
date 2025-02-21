<?php  // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'mysqli';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'i9067080_mo1';
$CFG->dbuser    = 'i9067080_mo1';
$CFG->dbpass    = 'U.7FXWB4aQxZZ96DSyN75';
$CFG->prefix    = 'mo_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbport' => 3306,
  'dbsocket' => '0',
  'dbcollation' => 'utf8mb4_unicode_ci',
);

$CFG->wwwroot   = 'http://www.wilsafetrainingcenter.com/moodle';
$CFG->dataroot  = '/home/jp3600276f4k/public_html/moodle/.htzw2soovv1o1l.data/';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 0777;

require_once(__DIR__ . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
