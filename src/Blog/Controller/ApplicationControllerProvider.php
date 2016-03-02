<?php 

namespace Blog\Controller;

use Silex\Application;
use Silex\ControllerProviderInterface;

class ApplicationControllerProvider implements ControllerProviderInterface {

	/**
     * This is the routing class where urls are routed to their controllers
     * 
     * @param $app 
     * @return $controllers
     */
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        // Post Routes 
        $controllers->match('/posts', 'Blog\Controller\PostController::listAction');
        $controllers->match('/post/new', 'Blog\Controller\PostController::newAction');
        $controllers->match('/post/{id}', 'Blog\Controller\PostController::showAction');
        $controllers->match('/post/{id}/update', 'Blog\Controller\PostController::updateAction');

        // Company Routes
        $controllers->match('/companies', 'Blog\Controller\CompanyController::listAction');
        $controllers->match('/company/new', 'Blog\Controller\CompanyController::newAction');
        $controllers->match('/company/{id}', 'Blog\Controller\CompanyController::showAction');
        $controllers->match('/company/{id}/update', 'Blog\Controller\CompanyController::updateAction');
        $controllers->match('/company/{id}/employees', 'Blog\Controller\CompanyController::getCompanyEmployeesAction');
        $controllers->match('/company/{id}/products', 'Blog\Controller\CompanyController::getCompanyProductsAction');

        // Employee Routes
        $controllers->match('/employees', 'Blog\Controller\EmployeeController::listAction');
        $controllers->match('/employee/new', 'Blog\Controller\EmployeeController::newAction');
        $controllers->match('/employee/{id}', 'Blog\Controller\EmployeeController::showAction');
        $controllers->match('/employee/{id}/update', 'Blog\Controller\EmployeeController::updateAction');

        // Product Routes 
        $controllers->match('/products', 'Blog\Controller\ProductController::listAction');
        $controllers->match('/product/new', 'Blog\Controller\ProductController::newAction');
        $controllers->match('/product/{id}', 'Blog\Controller\ProductController::showAction');
        $controllers->match('/product/{id}/update', 'Blog\Controller\ProductController::updateAction');

        return $controllers;
    }
}