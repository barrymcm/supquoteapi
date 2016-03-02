<?php

ob_start();
/**
* Deletes a blog post
*/
require_once dirname(__DIR__).'/bootstrap.php';

/** @var Post The post to delete */
$post = $entityManager->find('Blog\Entity\Post', $_GET['id']);

if (!$post) 
{
	throw new \Exception('Post not found');
}

try 
{
// Delete the entity and flush
$entityManager->remove($post);
$entityManager->flush();

// Redirects to the index
header('Location: index.php');
exit;
} 
catch(Exception $e)
{
	$e->getMessage();
}

