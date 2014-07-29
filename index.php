<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);


// Yii::createWebApplication($config)->run();
$apl =  Yii::createWebApplication($config);

$apl->setAliases
(
        array
        (
            "controllers" => "application.controllers",
            "models" => "application.models",
            "views" => "application.views",
            "widgets" => "application.widgets",
            
            "actions" => "application.controllers.actions",
            "filters" => "application.controllers.filters",
        )
);

$apl->controllerMap = array
(
    "slavacmap" => array
    (
        "class" => "controllers.SlavaController",
        "pageTitle" => "",
    ),
);

$apl->run();
return;
