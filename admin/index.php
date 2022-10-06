<?php
session_start();
if(!isset($_SESSION['useradmin']))
{
    header('location:login.php');
}
require_once ("../vendor/autoload.php");
require_once("../config/database.php");
use App\libraries\router;
date_default_timezone_set('Asia/Ho_Chi_Minh');
new Router('admin');