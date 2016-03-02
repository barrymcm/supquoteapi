<?php 

namespace Blog\Controller;

use Blog\Application;
use Silex\ControllerCollection;
use Blog\Controller\ApplicationControllerProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

/**  
 * Product Controller
 * 
 */
class ProductController
{
	/**
	 * [listAction description]
	 * @param  Request $request [description]
	 * @return [json]  [returns a list of company products]
	 */
	public function listAction(Request $request)
	{
		$app = new Application();
		$data = ['products' => []];
		
		try {
			$products = $app['repository.product']->findAllProducts();
		} catch (\Exception $e) {
			$e->getMessage();
		}

		foreach($products as $product) {
			$data['products'][] = $product;
		}

		return new JsonResponse($data);
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
		$product = $app['repository.product']->findProductById($request->get('id'));
		
		return new JsonResponse($product);
	}

	/**
	 * [editAction description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function editAction(Request $request)
	{
		$app = new Application();
		
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

