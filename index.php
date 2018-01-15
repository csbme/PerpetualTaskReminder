<?php
declare(strict_types=1);

require_once 'bootloader.php';

$configDatabasePath = parse_ini_file('config/config.ini', true)['database']['path_to_sqlite_file'];
$connection = new PDO('sqlite:'.$configDatabasePath);
$database = new Database($connection);

(new Main($database))->execute();
