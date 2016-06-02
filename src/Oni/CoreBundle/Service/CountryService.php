<?php
/**
 * Created by PhpStorm.
 * User: peteratkins
 * Date: 10/05/2016
 * Time: 23:18
 */

namespace Oni\CoreBundle\Service;


use Doctrine\Common\Persistence\ObjectRepository;
use Oni\CoreBundle\Doctrine\Spec\CitySearch;
use Oni\CoreBundle\Entity\City;
use Oni\CoreBundle\Entity\Country;
use Oni\CoreBundle\Entity\Repository\CityRepository;
use Oni\CoreBundle\Entity\Repository\CountryRepository;
use Oni\CoreBundle\Entity\Repository\NationalityRepository;

class CountryService {
	
	/**
	 * @var \Doctrine\Common\Persistence\ObjectRepository
	 */
	protected $countryRepository;

	/**
	 * @var \Doctrine\Common\Persistence\ObjectRepository
	 */
	protected $cityRepository;

	/**
	 * @var \Oni\CoreBundle\Entity\Repository\NationalityRepository
	 */
	protected $nationalityRepository;

	/**
	 * @var string
	 */
	protected $class;

	public function __construct(
		CountryRepository $countryRepository,
		CityRepository $cityRepository,
		NationalityRepository $nationalityRepository)
	{
		$this->countryRepository = $countryRepository;
		$this->cityRepository = $cityRepository;
		$this->nationalityRepository = $nationalityRepository;
	}

	public function findCountryBy($criteria){

		

	}

	public function findCountryByIso($iso){



	}

	public function findCountryByIso3($iso3){



	}

	public function findCountryByName($name){



	}

	public function getNationalities(){

		return $this->nationalityRepository->findAll();

	}

	public function getCountries(){

		return $this->countryRepository->findAll();

	}

	public function getCities(){

		return $this->cityRepository->createQueryBuilder('ci')
			->select(array(
				'co.niceName',
				'ci.id',
				'ci.cityName'
			))
			->join('ci.country', 'co')
			->getQuery()
			->getArrayResult();

	}

	public function getCitiesBy($searchTerm){

		$citySearch = new CitySearch($searchTerm);
		return $this->cityRepository->match($citySearch);

	}

}