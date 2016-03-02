<?php 

namespace Blog\Controller;

use Blog\Application;
use Blog\Entity\Employee;
use Silex\ControllerCollection;
use Blog\Controller\ApplicationController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class EmployeeController 
{
	/**
	 * [listAction description]
	 * @param  Request $request [description]
	 * @return [json]  [returns a list of company employees]
	 */
	public function listAction(Request $request)
	{
		$app = new Application();
		$data = ['employees' => array()];
		
		try {
			$employees = $app['repository.employee']->findCompanyEmployees();
		} catch (\Exception $e) {
			echo $e->getMessage();
		}

		foreach($employees as $employee) {
			$data['employees'][] = $employee;
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

		$employee = $app['repository.employee']->findEmployeeById($id);
		return new JsonResponse($employee);
		
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

		$result = $app['repository.employee']->findOneBy(['id' => $id]);
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

}