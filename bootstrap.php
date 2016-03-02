<?php 

require_once __DIR__."/vendor/autoload.php";
require_once __DIR__."/config/config.php";

use Blog\Application;
use Doctrine\ORM\Events;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\EventManager;
use Blog\EventListeners\InsultEventListener;
use Blog\EventSubscriber\MailAuthorOnCommentEventSubscriber;

$app = new Blog\Application(["debug" => true]);

$entitiesPath = array(__DIR__.'/src/Blog/Entity');

$config = Setup::createAnnotationMetadataConfiguration($entitiesPath, $devMode);

$eventManager = new EventManager();
$eventManager->addEventListener([Events::prePersist], new InsultEventListener());
$eventManager->addEventSubscriber(new MailAuthorOnCommentEventSubscriber());

$entityManager = EntityManager::create($dbParams, $config, $eventManager);
$entityManager->getConnection()
	->getConfiguration()
	->setSQLLogger(new \Doctrine\DBAL\Logging\EchoSQLLogger());
