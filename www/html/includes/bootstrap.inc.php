<?php
#Base Private which is a shared component
$PathToPrivate = __DIR__ . '/../../private';
set_include_path(get_include_path() . PATH_SEPARATOR . $PathToPrivate . "/classes");

#PLACE FOR EXTENSION 
#$PathToBestProject = __DIR__ . '/../../BestProject';
#set_include_path(get_include_path() . PATH_SEPARATOR . $PathToBestProject . "/classes");

spl_autoload_register('spl_autoload');
spl_autoload_extensions('.class.php');

