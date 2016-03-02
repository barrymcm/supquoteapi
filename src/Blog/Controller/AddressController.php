<?php 

namespace Blog\Controller;

use Blog\Application;
use Silex\ControllerCollection;
use Blog\Controller\ApplicationController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class AddressController 
{
	/**
	 * [listAction description]
	 * @param  Request $request [description]
	 * @return [json]  [returns a list of company employees]
	 */
	public function listAction(Request $request)
	{
		$app = new Application();
		
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
	 * [lists all the companies addresses / branches]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function showAction(Request $request)
	{
		$app = new Application();
		$id = $request->get('id');

		try {
			$result['address'] = $app['repository.address']->findCompanyAddresses($id);
		} catch (Exception $e) {
			$result = $e->getMessage();
		}

		return new JsonResponse($result);
		
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

		$result = $app['repository.address']->findOneBy(['id' => $id]);
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