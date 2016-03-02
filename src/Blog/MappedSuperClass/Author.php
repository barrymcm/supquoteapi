<?php

namespace Blog\MappedSuperClass;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Column;

/**
* Author superclass
*
* @Entity
* @InheritanceType("SINGLE_TABLE")
*/
abstract class Author {

	/**
	* @var int
	*
	* @Id
	* @GeneratedValue    
	* @Column(type="integer")
	*/
	protected $id;

	/**
	* @var string
	*
	* @Column(type="string")
	*/
	protected $name;

	/**
	* @var string
	*
	* @Column(type="string")
	*/
	protected $email;

	/**
	* Set name
	*
	* @return $this;
	*/
	public function setName($name)
	{
		return $this->name = $name;
	}

	/**
	* Get name
	*
	* @param 
	* @return $name;
	*/
	public function getName()
	{
		$this->name;

		return $this;
	}


	/**
	* Set email
	*
	* @return $this;
	*/
	public function setEmail($email)
	{
		return $this->email = $email;
	}


	/**
	* Get email
	*
	* @return $this;
	*/
	public function getEmail()
	{
		$this->email;

		return $this;
	}



}