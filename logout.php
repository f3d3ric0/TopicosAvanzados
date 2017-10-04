<?php
session_start();
unset($_SESSION['auth']);
unset($_SESSION['usuario']);
session_destroy();
header('Location: index.php');
?>