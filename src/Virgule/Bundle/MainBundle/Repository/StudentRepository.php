<?php

namespace Virgule\Bundle\MainBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\Query;
use Doctrine\DBAL\Connection;

/**
 * StudentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class StudentRepository extends EntityRepository {

    private function createDefaultQueryBuilder() {
        return $this->createQueryBuilder('s')->add('orderBy', 's.lastname ASC, s.firstname ASC');
    }
    
    private function getBasicQueryBuilder() {
        $qb = $this
            ->createDefaultQueryBuilder()
            ->select('s.id as student_id, s.firstname as firstname, s.lastname as lastname, s.gender as gender, s.phoneNumber as phoneNumber, s.cellphoneNumber, s.registrationDate, s.nativeCountry');
        return $qb;
    }
    
    public function getQueryBuilderForStudentEnrolledInCourses(Array $courseIds) {
        $qb = $this->createDefaultQueryBuilder()
            ->innerJoin('s.courses', 'c2', 'WITH', 'c2.id IN (:coursesIds)')
            ->setParameter('coursesIds', $courseIds, Connection::PARAM_INT_ARRAY);
        return $qb;
    }
    
    /**
     * Select all students enrolled in one or more class of the selected semester
     * @return type
     */
    public function loadAllEnrolled($semesterId) {
        $qb = $this->getBasicQueryBuilder()
                ->addSelect('t.id as teacher_id, t.firstName as teacher_firstName, t.lastName as teacher_lastName')
                ->addSelect('c2.id as course_id, l.label as level, l.htmlColorCode as levelColorCode')
                ->addSelect('count(cm.id) as nb_comments')
                ->innerJoin('s.courses', 'c2')
                ->innerJoin('c2.classLevel', 'l')
                ->leftJoin('s.welcomedByTeacher', 't')
                ->leftJoin('s.comments', 'cm')
                ->where('c2.semester = :semesterId')
                ->add('orderBy', 's.lastname ASC, s.firstname ASC')
                ->add('groupBy', 's.id, c2.id')
                ->setParameter('semesterId', $semesterId);
        
        $q = $qb->getQuery();
        $students = $q->execute(array(), Query::HYDRATE_ARRAY);
        return $students;
    }
    
    public function loadNotEnrolledInCourses(Array $courseIds) {
        $qb = $this->getBasicQueryBuilder()
            ->addSelect('t.id as teacher_id, t.firstName as teacher_firstName, t.lastName as teacher_lastName')
            ->addSelect('count(cm.id) as nb_comments')
            ->leftJoin('s.welcomedByTeacher', 't')
            ->leftJoin('s.comments', 'cm')
            ->leftJoin('s.courses', 'c2')
            ->where('c2.id IS NULL')
            ->orWhere('c2.id NOT IN (:coursesIds)')
            ->add('groupBy', 's.id')
            ->setParameter('coursesIds', $courseIds, Connection::PARAM_INT_ARRAY);
        return $qb->getQuery()->execute(array(), Query::HYDRATE_ARRAY);
    }

    public function loadAllEnrolledInCourses(Array $courseIds) {
        $qb = $this->getQueryBuilderForStudentEnrolledInCourses($courseIds)
            ->select('s.id as student_id, s.firstname as firstname, s.lastname as lastname, 
                s.gender as gender, s.phoneNumber as phoneNumber, s.cellphoneNumber, s.registrationDate, s.nativeCountry')
            ->addSelect('count(cm.id) as nb_comments')
            ->leftJoin('s.comments', 'cm')
            ->add('groupBy', 's.id');
        return $qb->getQuery()->execute(array(), Query::HYDRATE_ARRAY);
    }
    
    /**
     * 
     * @param array $courseIds
     * @return type
     */
    public function loadAllEnrolledInCourse($courseId) {
        return $this->loadAllEnrolledInCourses(Array($courseId));
    }
    
    
    public function loadAllEnrolledInCourseEntities($courseId) {
        $qb = $this->createDefaultQueryBuilder()   
            ->innerJoin('s.courses', 'c2', 'WITH', 'c2.id = :courseId')
            ->setParameter('courseId', $courseId);
        return $qb->getQuery()->execute();
    }

    public function loadAllPresentAtClassSession($classSessionId) {
        $qb = $this->getBasicQueryBuilder()
                ->innerJoin('s.classSessions', 'cs')
                ->where('cs.id = :classSessionId')
                ->setParameter('classSessionId', $classSessionId)
                ->addSelect('count(cm.id) as nb_comments')
                ->leftJoin('s.comments', 'cm')
                ->add('groupBy', 's.id');
        
        return $qb->getQuery()->execute(array(), Query::HYDRATE_ARRAY);
    }
    
    public function getStudentsInformation($semesterId) {
        $q = $this
                ->createDefaultQueryBuilder()
                ->addSelect('s.id as student_id, s.gender as student_gender, s.birthdate as student_birthDate')
                ->addSelect('s.nativeCountry')
                ->innerJoin('s.courses', 'c2')
                ->where('c2.semester = :semesterId')
                ->setParameter('semesterId', $semesterId)
                ->distinct()
                ->getQuery()
        ;
        $students = $q->execute(array(), Query::HYDRATE_ARRAY);
        return $students;
    }
    
    public function getNumberOfStudentsPerClassLevel($semesterId) {
        $q = $this
                ->getBasicQueryBuilder()
                ->addSelect('cl.id as classLevel_id, cl.label as classLevel_label, cl.htmlColorCode as classLevel_color, count(s.id) as nb_students')
                ->innerJoin('s.courses', 'c2')
                ->innerJoin('c2.classLevel', 'cl')
                ->where('c2.semester = :semesterId')
                ->setParameter('semesterId', $semesterId)
                ->distinct()
                ->add('orderBy', 'cl.label')
                ->add('groupBy', 'cl.id')
                ->getQuery()
        ;
        $students = $q->execute(array(), Query::HYDRATE_ARRAY);
        return $students;
    }
}