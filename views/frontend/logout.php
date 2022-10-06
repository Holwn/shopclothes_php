<?php
unset($_SESSION['user_customer']);
unset($_SESSION['userid']);
header('location:index.php?option=login');