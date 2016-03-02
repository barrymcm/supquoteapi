<?php 

namespace Blog\DataFixtures;

use Blog\Entity\Post;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;

/**
* Post Fixtures
*/
class LoadPostData implements FixtureInterface {

	/**
	*
	* Number of posts to add
	*/
	const NUMBER_OF_POSTS = 10;

	/**
	 * {@inheritDoc}
	 */
	public function load(Objectmanager $manager)
	{
		for($i=0; $i <= self::NUMBER_OF_POSTS; $i++)
		{
			$post = new Post();

			$post->setTitle(sprintf("Blog post number %d", $i))
				 ->setBody("Lorem ipsum dolor sit amet, consectetur adipiscing")
				 ->setPublicationDate(new \DateTime(sprintf('- %d days', 
						self::NUMBER_OF_POSTS - $i))
				 );
			
			$manager->persist($post);

		}

		$manager->flush();
	}

}

