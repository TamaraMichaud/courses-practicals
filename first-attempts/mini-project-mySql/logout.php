<?php
session_start();
 session_unset();

session_destroy();

echo "You've been logged out, goodbye!";

print_r($_SESSION); // shows empty array... tutorial had blank? Strange??
?>