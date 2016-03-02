<?php 

namespace Blog\Provider;

// use Blog\Application;
use Silex\Application;
use Doctrine\ORM\Events;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\EventManager;
use Silex\ServiceProviderInterface;
use Blog\EventListeners\InsultEventListener;
use Blog\EventSubscriber\MailAuthorOnCommentEventSubscriber;

class ApplicationServiceProvider implements ServiceProviderInterface
{
	/**
	 * 
	 * Regisers the custom application service providers
	 */
	public function register(Application $app)
	{
		$app['entityManager'] = $app->share(function () use ($app) {
			
			$dbParams = array(
	                'driver'    => 'pdo_mysql',
	                'host'      => '127.0.0.1',
	                'dbname'    => 'motion',
	                'user'      => 'admin',
	                'password'  => ''
	        );

			$entitiesPath = array(dirname(__DIR__).'/Entity');

			$config = Setup::createAnnotationMetadataConfiguration($entitiesPath, $devMode);
			$eventManager = new EventManager();
			
			$eventManager->addEventListener([Events::prePersist], new InsultEventListener());
			$eventManager->addEventSubscriber(new MailAuthorOnCommentEventSubscriber());
			
			return EntityManager::create($dbParams, $config, $eventManager);
		});

		$app['repository.post'] = $app->share(function () use ($app){
            return $app['entityManager']->getRepository('Blog\Entity\Post');
        });

        $app['repository.blog'] = $app->share(function () use ($app){
            return $app['entityManager']->getRepository('Blog\Entity\Blog');
        });

        $app['repository.employee'] = $app->share(function() use ($app) {
        	return $app['entityManager']->getRepository('Blog\Entity\Employee');
        });

        $app['repository.company'] = $app->share(function () use ($app) {
        	return $app['entityManager']->getRepository('Blog\Entity\Company');
        });

        $app['repository.address'] = $app->share(function () use ($app) {
        	return $app['entityManager']->getRepository('Blog\Entity\Address');
        });

        $app['repository.comment'] = $app->share(function () use ($app) {
        	return $app['entityManager']->getRepository('Blog\Entity\Comment');
        });

        $app['repository.product'] = $app->share(function () use ($app) {
        	return $app['entityManager']->getRepository('Blog\Entity\Product');
        });

        $app['repository.businessCategory'] = $app->share(function () use ($app) {
        	return $app['entityManager']->getRepository('Blog\Entity\BusinessCategory');
        });
	}

	/**
     * Bootstraps the application.
     *
     * This method is called after all services are registered
     * and should be used for "dynamic" configuration (whenever
     * a service must be requested).
     */
	public function boot(Application $app)
	{
	}
}