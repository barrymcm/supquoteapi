<?php

namespace Blog\Controller;

use Blog\Application;
use Silex\ControllerCollection;
use Blog\Controller\ApplicationController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class PostController 
{	
	/**
	 * /posts
	 * 
	 * @var $posts \Blog\Entity\Post[] 
	 * Retrieve the list of all blog posts  
	 */
	public function listAction(Request $request)
	{	
		$app = new Application();
		$posts = $app['repository.post']->findAllPosts();
		
		return new JsonResponse($posts);
	}

	/**
	 * /post/new
	 * 
	 * @param  Request
	 * @return [type]
	 */
	public function newAction(Request $request)
	{
		// Show the form
		// Get the Request
		// Validate the details
		// Create the record
		// If successfull redirect to the new record
		// If not successfull show the form again

		$request->setId();
	 	htmlspecialchars($request->setTitle());
		$request->setBody();
		$request->setPublicationDate();
		$request->setComments();
		$request->setTags();
		$request->setAuthor();

		return $app['twig']->render('post.twig.html', array(
			'posts' => $posts
		));
	}

	/**
	 * /post/{id}
	 * 
	 * @var $posts \Blog\Entity\Post[] 
	 * Retrieve the list of all blog posts  
	 */
	public function showAction(Request $request)
	{
		$app = new Application();
		$id = $request->get('id');

		$post = $app['repository.post']->findPostWithComments($id);

		return new jsonResponse($post);
		
		// return $app['twig']->render('post.html.twig', array(
		// 	'post' => $post
		// ));
	}

	/**
	 * /post/{id}/update
	 * 
	 * @var $posts \Blog\Entity\Post[] 
	 * Retrieve the list of all blog posts  
	 */
	public function editAction(Request $request)
	{	
		$post = $this->showAction($request);
		
	}

	/**
	 * @var $posts \Blog\Entity\Post[] 
	 * Retrieve the list of all blog posts  
	 */
	public function updateAction(Request $request)
	{	
		
	}

	/**
	 * @var $posts \Blog\Entity\Post[] 
	 * Retrieve the list of all blog posts  
	 */
	public function deleteAction(Request $request)
	{	
		$post = $this->showAction($request);
		
	}

	/**
	 * @var $posts \Blog\Entity\Post[] 
	 * Retrieve the list of all blog posts  
	 */
	public function destroyDelete(Request $request)
	{	
		
	}

}

