<?php 

namespace Blog\DataFixtures;

use Blog\Entity\Company;
use Blog\Entity\Employee;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

/**
 * Employee Fixtures
 */
class LoadEmployeeData implements FixtureInterface, DependentFixtureInterface	
{
	/**
	 * {@inheritDoc}
	 */
	public function load(ObjectManager $manager)
	{
		$companies = $manager->getRepository('Blog\Entity\Company')->findAll();

		foreach($companies as $company) {
			
			if($company->getId() == 124)
			{	

				$id = $company->getId();
				echo $id; 
				$employee = new Employee();
				$employee->setFirstName('John');
				$employee->setLastName('McIntyre');
				$employee->setPosition('Production Mngr');
				$employee->setPhone('0897766554');
				$employee->setFax('012345678');
				$employee->setEmail('j.mcintyre@testco.com');
				$employee->setCompany($companies);
				
				$manager->persist($employee);
				$manager->flush();
			}
		}
	}

	/**
	* {@inheritDoc}
	*/
	public function getDependencies()
	{
		return ['Blog\DataFixtures\LoadCompanyData'];
	}
}