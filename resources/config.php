<?php

$config = array(
    "db" => array(
        "db1" => array(
            "dbname" => "database1",
            "username" => "dbUser",
            "password" => "pa$$",
            "host" => "localhost"
        ),
        "db2" => array(
            "dbname" => "database2",
            "username" => "dbUser",
            "password" => "pa$$",
            "host" => "localhost"
        )
    ),
    "urls" => array(
        "baseUrl" => "http://localhost:8080/AttributeShoppe/index.php"
    ),
    "paths" => array(
        "resources" => "/usr/local/zend/apache2/htdocs/AttributeShoppe/resources",
        "images" => array(
            "content" => $_SERVER["DOCUMENT_ROOT"] . "/images/content",
            "layout" => $_SERVER["DOCUMENT_ROOT"] . "/images/layout"
        )
    )
);

/* 
    Creating constants
*/

defined("LIBRARY_PATH")
or define("LIBRARY_PATH", realpath(dirname(__FILE__) . '/library'));

defined("TEMPLATES_PATH")
or define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/templates'));

defined("IMAGES_PATH")
or define("IMAGES_PATH", realpath(dirname(__FILE__) . '/resources/img'));

defined("BASE_URL")
or define('BASE_URL', 'http://localhost:8085/AttributeShoppe/public_html');

//defined("BASE_URL")
//or define('BASE_URL', $_SERVER['DOCUMENT_ROOT' . '/AttributeShoppe/public_html/']);


//define('ROOT_PATH', realpath(__DIR__.'/../'));
/*
    Error reporting. 
*/
ini_set("error_reporting", "true");
error_reporting(E_ALL|E_STRCT);
