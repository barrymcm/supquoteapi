<?php 

namespace Blog\Controller;

use Blog\Application;
use Blog\Entity\Company;
use Silex\ControllerCollection;
use Blog\Controller\ApplicationController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class CompanyController 
{
	/**
	 * [listAction description]
	 * @param  Request $request [description]
	 * @return [json]  [returns a list of company employees]
	 */
	public function listAction(Request $request)
	{
		$app = new Application();
		$data = array("companies" => array());

		try {	
			$companies = $app['repository.company']->findAllCompanies();
		} catch (\Exception $e) {
			echo $e->getMessage();
		}

		foreach($companies as $company) {
			$data['companies'][] = $company;
		}

		$response = new JsonResponse($data);
		return $response;
	}

	/**
	 * [newAction description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function newAction(Request $request)
	{
		$app = new Application();
		$body = $request->getContent();
		print_r($body);		
		
		// try {
		// 	$app['repository.company']->createNewCompany($body);
		// 	$company = $app['repository.company']->getLastInsert();

		// 	return new JsonResponse($data, 201); 
		// } catch(\Exception $e) {
		// 	$e->getMessage()
		// 	return new JsonResponse(500);
		// }
	}

	/**
	 * [showAction description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function showAction(Request $request)
	{
		$app = new Application();
		$id = $request->get('id');
		
		try {
			$data['company'] = $app['repository.company']->findCompanyById($id);
		} catch (\Exception $e) {
			echo $e->getMessage();
		}

		return new JsonResponse($data, 200);
	}

	/**
	 * [editAction description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function editAction(Request $request)
	{
		$app = new Application();
		$id = $request->get('id');

		try {
			$company = $app['repository.company']->findCompanyById($id);
		} catch (\Exception $e) {
			echo $e->getMessage();
		}

		return new JsonResponse($company);
		
	}

	/**
	 * [updateAction description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function updateAction(Request $request)
	{
		$app = new Application();
		
	}

	/**
	 * [deleteAction description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function deleteAction(Request $request)
	{
		$app = new Application();
		
	}

	/**
	 * [destroyAction description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function destroyAction(Request $request)
	{
		$app = new Application();
		
	}

	/**
	 * [getCompanyEmployeesAction - returns all the employees belonging to a company]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function getCompanyEmployeesAction(Request $request)
	{
		$app = new Application();
		$uri = $app->splitUriParams($request);
		$employees = $app['repository.company']->findCompanyEmployees($uri[1]);

		return new JsonResponse($employees);
	}

	/**
	 * [getCompanyProductsAction - returns all the companies products]
	 * @param  Request $request [url]
	 * @return [type]           [description]
	 */
	public function getCompanyProductsAction(Request $request)
	{
		$app = new Application();
		$uri = $app->splitUriParams($request);
		$products = $app['repository.company']->findCompanyProducts($uri[1]);

		return new JsonResponse($products);
	}
}