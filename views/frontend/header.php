<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo (isset($title))?$title:"Hoàng's Shop"; ?></title>
    <meta name="description" content="<?php echo (isset($metakey))?$title:"Từ Khóa SEO"; ?>">
    <meta name="keywords" content="<?php echo (isset($metadesc))?$title:"Mô Tả SEO"; ?>">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/all.min.css">
    <link rel="stylesheet" href="public/css/layoutsite.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="index.php" class="text-center">
        <img src="./public/images/logo.jpg" alt="" style="width:150px;height:100px;" class="logo">
      </a>
      <?php require_once("views/frontend/mod_mainmenu.php") ?>
        </div>
      </div>
    </div>
  </header>