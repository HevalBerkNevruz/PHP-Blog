<html>
<head>
    <title>Anasayfa</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/style"/>
    <link rel="stylesheet" href="css/navbar-bottom"/>
    <link rel="stylesheet" href="css/slider"/>
    <script type="text/javascript" src="jquery-1.6.1.min.js"></script>
    <script type="text/javascript" src="js/search.js"></script>
    <script type="text/javascript" src="js/slider.js"></script>
</head>
<body>
<?php include("includes/adjustment.php"); ?>
<?php include("includes/connection.php"); ?>
<?php include("includes/navbar_logo.php"); ?>
<!-- jQuery Slider -->
<div class="all">
    <div id="sliderall">
        <div id="slider">
            <div class="slider">
                <ul>
                    <li><img src="<?php URL ?>images/oracle-big-data.jpg"/></li>
                    <li><img src="<?php URL ?>images/ibm-cloud.jpg"/></li>
                    <li><img src="<?php URL ?>images/linux-redhat.fw.png"/></li>
                </ul>
            </div>
        </div>
    </div>
</div>
    <?php homepage_content(); ?>
</body>
</html>