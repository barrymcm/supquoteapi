<?php 

namespace Blog\DataFixtures;

use Blog\Entity\Company;
use Blog\Entity\Address;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;

/**
* Company Fixtures
*/
class LoadCompanyData implements FixtureInterface
{
	/**
	* {@inheritDoc}
	*/
	public function load(ObjectManager $manager)
	{
		$company = new Company();
		
		$company->setName('TestCompany Ltd');
		$company->setCountry('Ireland');
		$company->setRegion('Leinser');
		$company->setCity('Dublin');
		$company->setStreet('Central Park Block 1 Level 3');
		$company->setPostCode('RD12345');
		$company->setRegNo('IE345434567');
		$company->setRegDate(new \DateTime());
		$company->setTaxNo('1234453');
		$company->setWebsite('www.testcompany.ie');

		$manager->persist($company);

		$company2 = new Company();

		$company2->setName('Testcompany2 Ltd');
		$company2->setCountry('Ireland');
		$company2->setRegion('Leinser');
		$company2->setCity('Dublin');
		$company2->setStreet('Central Park Block 1 Level 3');
		$company2->setPostCode('RD12345');
		$company2->setRegNo('IE345434567');
		$company2->setRegDate(new \DateTime());
		$company2->setTaxNo('1234453');
		$company2->setWebsite('www.testcompany2.ie');

		$manager->persist($company2);

		$company3 = new Company();

		$company3->setName('Testcompany3 Ltd');
		$company3->setCountry('Ireland');
		$company3->setRegion('Munster');
		$company3->setCity('Cork');
		$company3->setStreet('The Quays Block 1 Level 3');
		$company3->setPostCode('RY12345');
		$company3->setRegNo('IE345439876');
		$company3->setRegDate(new \DateTime());
		$company3->setTaxNo('R555654');
		$company3->setWebsite('www.testcompany3.ie');

		$manager->persist($company3);
		$manager->flush();
	}
}