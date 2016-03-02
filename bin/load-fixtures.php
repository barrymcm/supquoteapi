<?php 

require_once dirname(__DIR__).'/bootstrap.php';

use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;

$loader = new Loader();
$loader->loadFromDirectory(__DIR__.'/../src/Blog/DataFixturesNew');

$purger = new ORMPurger();
$executor = new ORMExecutor($entityManager, $purger);
$executor->execute($loader->getFixtures());