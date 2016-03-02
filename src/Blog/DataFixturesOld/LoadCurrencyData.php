<?php 

namespace Blog\DataFixtures;

use Blog\Entity\Comment;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

/**
* Comment fixtures
*/
// class LoadCurrencyData implements FixtureInterface, DependentFixtureInterface
// {
// 	/**
// 	* {@inheritDoc}
// 	*/
// 	public function load(ObjectManager $manager)
// 	{
// 		$companies = $manager->getRepository('Blog\Entity\Company')->findOneBy(['id' => 33]);
// 		$currency = new Currency();
// 		->
// 		->setPost($post);	
// 		$manager->persist($comment);

// 		$manager->flush();
// 	}
// }
