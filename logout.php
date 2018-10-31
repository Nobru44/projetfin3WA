<?php
session_start();
$page = 'logout';

session_destroy();

header('Location: index.php');