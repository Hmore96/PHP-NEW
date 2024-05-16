<?php
session_start();

// Session löschen
session_unset();
session_destroy();

// Weiterleitung zur Login-Seite oder einer anderen Startseite
header("Location: login.php");
exit;
?>
