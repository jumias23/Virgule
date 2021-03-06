<?php

namespace Virgule\Bundle\MainBundle\Repository;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

/**
 * TeacherRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TeacherRepository extends EntityRepository implements UserProviderInterface {
    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function createDefaultQueryBuilder() {
        return $this->createQueryBuilder('t');
    }
    
    public function loadUserByUsername($username) {
        $q = $this->createDefaultQueryBuilder()
                ->where('t.username = :username')
                ->setParameter('username', $username)
                ->getQuery()
        ;

        try {
            // The Query::getSingleResult() method throws an exception
            // if there is no record matching the criteria.
            $user = $q->getSingleResult();
        } catch (NoResultException $e) {
            throw new UsernameNotFoundException(sprintf('Unable to find an active Teacher object identified by "%s".', $username), null, 0, $e);
        }
        return $user;
    }

    public function refreshUser(UserInterface $user) {
        $class = get_class($user);
        if (!$this->supportsClass($class)) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $class));
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class) {
        return $this->getEntityName() === $class || is_subclass_of($class, $this->getEntityName());
    }

    public function getAvailableTeachersQueryBuilder($organizationBranchId, $isActive = true) {
        $q = $this->createDefaultQueryBuilder()
            ->where('t.isActive = :isActive')
            ->andWhere('t.username <> :rootUsername')
            ->innerJoin('t.organizationBranches', 'ob', 'WITH', 'ob.id = :organizationBranchId')                
            ->add('orderBy', 't.lastName ASC, t.firstName ASC')
            ->setParameter('organizationBranchId', $organizationBranchId)
            ->setParameter('isActive', $isActive)
            ->setParameter('rootUsername', "root");
         return $q;
    }
    public function getTeachersByStatus($organizationBranchId, $isActive = true) {
        $q = $this->createDefaultQueryBuilder()
            ->where('t.isActive = :isActive')
            ->andWhere('t.username <> :rootUsername')
            ->innerJoin('t.organizationBranches', 'ob', 'WITH', 'ob.id = :organizationBranchId')                
            ->add('orderBy', 't.lastName ASC, t.firstName ASC')
            ->setParameter('organizationBranchId', $organizationBranchId)
            ->setParameter('isActive', $isActive)
            ->setParameter('rootUsername', "root")
            ->getQuery()
        ;
        $teachers = $q->execute();
        return $teachers;
    }
}
