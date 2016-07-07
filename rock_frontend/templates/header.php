<?php
$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);
?>
<!DOCTYPE html>
<html lang="en" >
    <head>

        <!--Title-->
        <title><?php
            if ($page_data['page_title'] != "") {
                echo $page_data['page_title'];
            } else {
                echo $page_data['page_name'];
            }
            ?></title>
        <!--meta tags-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <?php
        if ($page_data['meta_data'] != "") {
            $meta_data = $page_data['meta_data'];
        } else {
            $meta_data = CUSTOMER . "," . $page_data['page_name'];
        }
        if ($page_data['description'] != "") {
            $description = $page_data['description'];
        } else {
            $description = '';
        }
        ?>
        <meta name="description" content="<?= $description; ?>">
        <meta name="keywords" content="<?= $meta_data; ?>">
        <meta name="author" content="GrowaRock">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--Scripts-->
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>   
        <script src="/<?= F_ASSETS ?>js/owl.carousel/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
        <!--CSS styles--> 
        <link rel="stylesheet" href="/<?= F_ASSETS ?>css/bootstrap.min.css" type="text/css"/>
        <!-- Bootstrap Dropdown Hover CSS -->
        <link href="/<?= F_ASSETS ?>css/animate.min.css" rel="stylesheet">
        <link href="/<?= F_ASSETS ?>css/bootstrap-dropdownhover.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/<?= F_ASSETS ?>owl.carousel/owl-carousel/owl.carousel.css" type="text/css"/>
        <link rel="stylesheet" href="/<?= F_ASSETS ?>owl.carousel/owl-carousel/owl.theme.css" type="text/css"/>
        <link rel="stylesheet" href="/<?= F_ASSETS ?>css/bootstrap-overwrites.css" type="text/css"/>
        <link rel="stylesheet" href="/<?= F_ASSETS ?>css/megamenu.css" type="text/css"/>
        <link rel="stylesheet" href="/<?= F_ASSETS ?>css/page_styles.css" type="text/css"/>
        <link rel="stylesheet" href="/<?= F_ASSETS ?>font-awesome-4.5.0/css/font-awesome.min.css" />
        <!--page Type specific CSS-->
        <link rel="stylesheet" href="<?= $page_data['css_file_location'] . $page_data['css_file_name'] ?>"/>
        <style>


            #owl-demo .item img{
                display: block;
                width: 100%;
                height: auto;
            }
            #bar{
                width: 0%;
                max-width: 100%;
                height: 4px;
                background: #E21A2C;
            }
            #progressBar{
                width: 100%;
                background: #EDEDED;
            }
            .rock-home-page-carousel img { border:3px solid #fff;}
            .jzoom {
                position: absolute;
                top: 250px;
                left: 100px;
                width: 350px;
                height: 350px;
            }

        </style>


    </head>
    <body>
        <?php
        $naviagtion = new Navigation();
        ?>
        <div class="rock-home-page-carousel">
            <?php
            $naviagtion->TopNavigation();
            ?>
        </div>
        <div class="row rock-in-between-navs">
            <!--logo-->
            <div class="col-md-4"></div>
            <!--Search-->
            <div class="col-md-3" style="margin-top: 10px; margin-bottom: 10px;">
                <form method="post">
                    <div class="col-lg-12">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <input type="submit" value="Go!" name="search_product" class="btn btn-default"/>
                            </span>
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                </form>

            </div>
            <!--Social Media-->
            <div class="col-md-5">
                <div class="col-lg-4" style="margin-top: 10px; margin-bottom: 10px;">
                    <center>
                        <!--Social Media-->

                        <div class="btn-group">
                            <?php
                            $front_end_logic = new FrontEndLogic();
                            $front_end_logic->GetSocialMedia();
                            if ($front_end_logic->social_media != NULL) {
                                foreach ($front_end_logic->social_media as $sm) {
                                    ?> 
                                    <a href="<?= $sm['url'] ?>" alt="Social Media Icons" title="<?= $sm['image_name'] ?>" target="_blank"><img src="<?= $sm['image_url'] . $sm['image_name'] ?>" alt="" height="30" width="30"/></a>

                                    <?php
                                }
                            }
                            ?>
                    </center>
                </div>
            </div>
        </div>
        <div class="rock-background-color-manager">
            <div class="rock-nav-bar-container">
                <div class="container">
                    <?php
                    $naviagtion->MegaNavigationMenu();
                    ?>
                </div>
            </div>
        </div>
        <?php
        If ($page_data['page_type'] == "9" || $page_data['page_type'] == "10" || $page_data['page_type'] == "11") {
            ?>
            <!--Bread Crumb-->
            <div class="container">
                <ul class="breadcrumb">

                    <?php
                    $front_end_logic->BuildBreadCrumb($page_data['page_parent'], $page_data['page_type']);
                    $front_end_logic->BreadCrumbLinks();
                    ?>
                    <li class="active"><?= $page_data['page_name'] ?></li>
                </ul>

            </div>
            <?php
        }
        ?>
        <!--END OF HEADER-->