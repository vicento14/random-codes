<?php
// src = https://www.youtube.com/watch?v=DuXHjdK--DU -> register and login using password_hash
// src = https://www.php.net/manual/en/function.password-hash.php
/*

this is same as if <password that the user types> == <password hash that is saved from the database>
password_verify(<password that the user types>,<password hash that is saved from the database>);

password_hash(<password that the user wants to save>, <password hash algorithm>);

list of password hash algorithm for password_hash

PASSWORD_BCRYPT (string)
PASSWORD_ARGON2I (string)
PASSWORD_ARGON2ID (string)
PASSWORD_DEFAULT (mixed)

*/
$password = "password";
echo "<td>".$password."</td><br>";
$password1 = password_hash($password, PASSWORD_BCRYPT);
echo "<td>".$password1."</td><br>";
$password1 = password_hash($password, PASSWORD_ARGON2I);
echo "<td>".$password1."</td><br>";
$password1 = password_hash($password, PASSWORD_ARGON2ID);
echo "<td>".$password1."</td><br>";
$password1 = password_hash($password, PASSWORD_DEFAULT);
echo "<td>".$password1."</td><br>";
?>