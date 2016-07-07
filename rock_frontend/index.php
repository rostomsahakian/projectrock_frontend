<?php

/*
 * Logic for the front end will commanded from here 
 * Logic comes from FrontEndLogic class
 */
$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);
require_once $baseDir . '/vendor/autoload.php';
require_once $baseDir . '/public_html/rock_backend/includes/config.php';

$front_end_logic = new FrontEndLogic();
$page_alias = NULL;
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : '';

/*
 * There are tow ways that we can get the page information
 * 1. By Page Alias
 * 2. By Page ID
 */
$page_array = explode("/", $page);
/*
 * If the page array is empty that means the url should be pointing to home page
 */
if ($page_array[0] == "") {
    /*
     * Get the home page ID
     */
    $page_id = $front_end_logic->GetHomePageID();
} else if ($page_array[0] != "" && count($page_array) > 1) {
    $link_count = count($page_array) - 1;
    /*
     * If array contains more that one element
     */
    for ($i = 0; $i < $link_count; $i++) {
        
    }
    //The last element will always be the page ID
    $page_id = $page_array[$i];
} else if ($page_array[0] != "" && count($page_array) == 1) {
    //This means that the page has alias
    $page_id = "";
    $page_alias = $page_array[0];
} else {
    $page_alias = "";
}

if ($page_alias != NULL) {
    //If true then get the page id and get the data for that page
    if ($front_end_logic->CheckIfPageHasAlias($page_alias)) {
        $front_end_logic->GetPageDataByAlias($page_alias);
    }
} else {
    $front_end_logic->GetpageDataByID($page_id);
}

$page_data = $front_end_logic->ReturnPageData();

switch ($page_data['page_type']) {
    case "1":
        include 'templates/header.php';
        $home_page = new HomePage();
        $home_page->MainHomePage($page_data);
        include 'templates/footer.php';
        break;
    case "":
        include 'templates/header.php';
        $home_page = new HomePage();
        $home_page->MainHomePage();
        include 'templates/footer.php';
        break;
    case "2":
        include 'templates/header.php';
        $contact_us = new ContactUs();
        include 'templates/footer.php';
        break;
    case "3":
        include 'templates/header.php';
        $about_us = new AboutUs();
        include 'templates/footer.php';
        break;
    case "4":
        include 'templates/header.php';
        $reviews = new Reviews();
        include 'templates/footer.php';
        break;
    case "5":
        include 'templates/header.php';
        $static_page = new StaticPage();
        include 'templates/footer.php';
        break;
    case "6":
        include 'templates/header.php';
        $brands = new Brands();
        include 'templates/footer.php';
        break;
    case "7":
        include 'templates/header.php';
        $single_brand = new Brand();
        include 'templates/footer.php';
        break;
    case "8":
        include 'templates/header.php';
        $catergory_page = new Categories();
        $catergory_page->CategoriesPageSetup($page_data);
        include 'templates/footer.php';
        break;
    case "9":
        include 'templates/header.php';
        $subCategroy_page = new SubCategories();
        $subCategroy_page->SubCategoriesPage($page_data);
        include 'templates/footer.php';
        break;
    case "10":
        include 'templates/header.php';
        $products_page =  new Products();
        include 'templates/footer.php';
        break;
    case "11":
        include 'templates/header.php';
        $hidden_page = new hiddenPage();
        include 'templates/footer.php';
        break;
}
    