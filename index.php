<?php
session_start();
require_once("vendor/autoload.php");
require_once("config/database.php");
use App\libraries\router;
new Router('site');