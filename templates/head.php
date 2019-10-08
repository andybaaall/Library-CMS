<?php
    if (is_dir('vendor')) { // if the directory at the same level, do some stuff:
        // this will only be true on the index page - index.php and vendor/ are at the same level
        require('vendor/autoload.php');
    } else {
        require('../vendor/autoload.php');
    }


 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- links and anchors are often going to route to the wrong place! here's a fix: -->
    <!-- the base tag sets the 'base' from which navigation happens -->
    <!-- so any time we request a file, it's going to prepend the base to the filepath -->
    <base href="http://192.168.33.10/Library-CMS/">

    <title>Yoobee School of Design Library</title>

    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
</head>
