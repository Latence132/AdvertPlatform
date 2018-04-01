<?php

namespace OC\PlatformBundle\Repository;

/**
 * AdvertSkillRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AdvertSkillRepository extends \Doctrine\ORM\EntityRepository
{
    //    public function getAdvertSkills()
    //    {
    //        $qb = $this
    //            ->createQueryBuilder('s')
    //            ->leftJoin('advert', 'a')
    //            ;
    //
    //    return $qb
    //            ->getQuery()
    //            ->getResult()
    //            ;
    //    }
    //    
    public function getAdvertSkill($id)
    {
        $qb = $this
            ->createQueryBuilder('s')
            ->where('s.advert = :id')
            ->setParameter('id', $id)
            ->leftJoin('s.skill','sk')
            ->addSelect('sk')
            ;

        return $qb
            ->getQuery()
            ->getResult()
            ;
    }
}