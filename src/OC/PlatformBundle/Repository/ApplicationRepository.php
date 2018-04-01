<?php

namespace OC\PlatformBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ApplicationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ApplicationRepository extends \Doctrine\ORM\EntityRepository
{
	public function getApplicationsWithAdvert($limit)
	{
		/*$repository->findBy(
		array('date' => 'DESC'),
		$limit,
		$offset = null
		);*/

		//correction

		$qb = $this->createQueryBuilder('a');

		// On fait une jointure avec l'entité Advert avec pour alias « adv »
		$qb
		->innerJoin('a.advert', 'adv')
		->addSelect('adv')
		;

		// Puis on ne retourne que $limit résultats
		$qb->setMaxResults($limit);

		// Enfin, on retourne le résultat
		return $qb
		->getQuery()
		->getResult()
		;
	}
}