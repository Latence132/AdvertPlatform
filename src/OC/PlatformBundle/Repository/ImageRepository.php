<?php

namespace OC\PlatformBundle\Repository;

/**
 * ImageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ImageRepository extends \Doctrine\ORM\EntityRepository
{
    public function getImages(Advert $adverts){
        $qb= $this->createQueryBuilder('a')
            ->addSelect('a')
            ->innerJoin('ad.adverts','ad')
            ->where('a.id = :adverts')
            ->setParameter('id', $id)
            ;
        return $qb->getQuery()
            ->getResult();

    }

   
}
