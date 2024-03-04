<?php
session_start();
session_destroy();
header('location: ./Brief_php/connexion.php');
exit;
