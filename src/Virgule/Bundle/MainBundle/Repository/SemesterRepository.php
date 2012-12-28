<?php

namespace Virgule\Bundle\MainBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * SemesterRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SemesterRepository extends EntityRepository {
     
    /**
     * Returns the current semester for the chosen org branch
     * @param type $organizationBranch
     * @return type
     * @throws NoResultException
     */
    public function loadCurrentSemester($organizationBranchId) {
        $now = new \DateTime('now');
        $now = $now->format("Y-m-d");
        
        $q = $this
            ->createQueryBuilder('s')
            ->where('s.organizationBranch = :organizationBranchId')
            ->andWhere(':currentDate >= s.startDate AND :currentDate <= s.endDate')
            ->setParameter('currentDate', $now)
            ->setParameter('organizationBranchId', $organizationBranchId)
            ->getQuery()
        ;

        try {
            // The Query::getSingleResult() method throws an exception
            // if there is no record matching the criteria.
            $semester = $q->getSingleResult();
        } catch (NoResultException $e) {
            throw new NoResultException(sprintf('Unable to find an active Semester object identified by "%s".', $username), null, 0, $e);
        }
        return $semester;
        
    }
}