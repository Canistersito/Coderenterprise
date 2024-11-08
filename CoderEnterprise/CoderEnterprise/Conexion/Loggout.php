<?php
session_start(); 
session_destroy(); 
header("Location: /CoderEnterprise/Landing/src/index.html"); 
exit(); 
?>