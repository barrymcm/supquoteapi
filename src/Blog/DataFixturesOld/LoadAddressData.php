<?php 

namespace Blog\DataFixtures;

use Blog\Entity\Address;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

/**
 * Address Fixtures
 */
class LoadAddressData implements FixtureInterface, DependentFixtureInterface	
{
	/**
	 * {@inheritDoc}
	 */
	public function load(ObjectManager $manager)
	{
		$company = $manager->getRepository('Blog\Entity\Company')->findOneBy(['id' => 49]);

		$address = new Address();
		$address->setCountry('England');
		$address->setRegion('Yorkshire');
		$address->setCity('Newcastle');
		$address->setStreet('Geordie Street');
		$address->setPostCode('A334FT2');
		$address->addCompany($company);
		$manager->persist($address);

		$address2 = new Address();
		$address->setCountry('Ireland');
		$address->setRegion('Leinster');
		$address->setCity('Dublin');
		$address->setStreet('Central Park, Sandyford');
		$address->setPostCode('SDF4567');
		$address->addCompany($company);
		$manager->persist($address);

		$manager->flush();
	}

	/**
	* {@inheritDoc}
	*/
	public function getDependencies()
	{
		return ['Blog\DataFixtures\LoadCompanyData'];
	}
}