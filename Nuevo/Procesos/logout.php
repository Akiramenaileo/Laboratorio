<?php
session_start();
session_destroy();
header("Location: ../Formularios/Inicio.php");
exit;
?>
