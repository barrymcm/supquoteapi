<?php

// Doctrine CLI configuration file

require_once __DIR__.'/../bootstrap.php';

use Doctrine\ORM\Tools\Console\ConsoleRunner;

/** 
* Enables us to run commands on the console
* such as : orm:generate:entities, 
* 			orm:schema-tool:create, 
* 			orm:schema-tool:update --force
* 
* @return  [ConsoleRunner]
*/
return ConsoleRunner::createHelperSet($entityManager);

