<?php
require_once(dirname(__FILE__, 2) . "/src/config/config.php ");
require_once(dirname(__FILE__, 2) . "/src/models/User.php ");

$user = new User(['name' => 'Bug', 'email' => 'bug@aumail.com']);

echo User::getSelect(['id' => 1], 'name, email');
echo "<br>";
echo User::getSelect(['name' => 'Chaves', 'email' => 'chaves@cod3r.com.br']);
echo "<br>";
echo User::getSelect(['name' => 'Chaves', 'email' => null]);
echo "<br>";
echo User::getSelect(['name' => 'Chaves', 'id' => 2]);


?>
