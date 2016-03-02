<?php 

namespace Blog\DataFixtures;

use Blog\Entity\BusinessCategory;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;

/**
 * BusinessCategory Fixtures
 */
class LoadBusinessCategoryData implements FixtureInterface
{
	/**
	 * {@inheritDoc}
	 */
	public function load(ObjectManager $manager)
	{
		$categories = [ "Arts, crafts, and collectibles",
						"Baby",
						"Beauty and fragrances",
						"Books and magazines",
						"Business to business",
						"Clothing, accessories, and shoes",
						"Computers, accessories, and services",
						"Education",
						"Electronics and telecom",
						"Entertainment and media",
						"Financial services and products",
						"Food retail and service",
						"Gifts and flowers",
						"Government",
						"Health and personal care",
						"Home and garden",
						"Nonprofit",
						"Pets and animals",
						"Religion and spirituality (for profit)",
						"Retail (not elsewhere classified)",
						"Services - other",
						"Sports and outdoors",
						"Toys and hobbies",
						"Travel",
						"Vehicle sales",
						"Vehicle service and accessories" ];


		foreach ($categories as $category) {
			
			$object = new BusinessCategory();

			$object->setCategory($category);

			$manager->persist($object);
			$manager->flush();
		}

	} 

}