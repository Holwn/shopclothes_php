<?php
session_start();
unset($_SESSION['useradmin']);
unset($_SESSION['userid']);
header('location:login.php');