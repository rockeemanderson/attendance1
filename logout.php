<?php
//includes the session _start(). it identifies the session that needs to be destroyed.
include_once 'includes/session.php'?>

<?php
//header() redirects the page
session_destroy();
header('Location: index.php');
?>