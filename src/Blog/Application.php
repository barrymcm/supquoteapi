<?php 

namespace Blog;

use Blog\Repository\PostRepository;
use Blog\Repository\BlogRepository;
use Symfony\Component\Finder\Finder;
use Silex\Provider\FormServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Blog\Repository\RepositoryContainer;
use Silex\Application as SilexApplication;
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\SecurityServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Blog\Provider\ApplicationServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Silex\Provider\SwiftmailerServiceProvider;
use Blog\Controller\ApplicationControllerProvider;

class Application extends SilexApplication
{
	public function __construct(array $values = array())
    {
        parent::__construct($values);

        $app = $this;
        
        $app->configureControllerRoutes($this);
        $app->configureExternalProviders($this);
        $app->configureApplicationServices($this);
        // $app->configureSecurityProvider($this);

        return $app;
    }

    /**
     * Loads all Controllers and their Routes
     */
    private function configureControllerRoutes(Application $app)
    {
        return $app->mount('/', new ApplicationControllerProvider);   
    }

    /**
     * [configureProviders description]
     * @param  Application
     * @return [type]
     */
    private function configureExternalProviders(Application $app)
    {
        /**
         * Twig Form Service Provider
         */
        $app->register(new FormServiceProvider());
        $app->register(new MonologServiceProvider(), array(
            'monolog.logfile' => __DIR__.'/../../logs/development.log',
        ));
        $app->register(new SessionServiceProvider());
        $app->register(new TwigServiceProvider(), array(
            'twig.path' => __DIR__.'/views',
        ));

        $app->register(new ValidatorServiceProvider());
        $app->register(new SwiftmailerServiceProvider());

        return $app;
    }

    /**
     * [configureServices description]
     * @param  Application
     * @return [type]
     */
    private function configureApplicationServices(Application $app)
    {
        $app->register(new ApplicationServiceProvider());
    }

    /**
     * @todo : configure this service
     * 
     * [configureSecurity description]
     * @param  Application
     * @return [type]
     */
    private function configureSecurityProvider(Application $app) {
        $app->register(new SecurityServiceProvider(), array());
    }   

    /**
     * [rootPath this is the path configuration for the application - set your path in here]
     * @param  [type]
     * @return [type]
     */
    private function rootPath($path)
    {
        return $app['root_dir'] = __DIR__.'/'.$path;
    }

    /**
     * doGet Function for handling GET requests with additional params in the url
     *
     * @param $request
     * @return $urlParams
     */
    public function splitUriParams(Request $request)
    {    
        if($request->isMethod('GET')) {       
            $uriParams = explode('/', $request->getRequestUri());
            $params = array_filter(array_flip($uriParams));
            $keys = array_keys($params);
        }
        return $keys;
    }
}