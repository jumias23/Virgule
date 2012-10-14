<?php

namespace Virgule\Bundle\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Virgule\Bundle\MainBundle\Entity\Teacher
 *
 * @ORM\Table(name="teacher")
 * @ORM\Entity(repositoryClass="Virgule\MainBundle\Repository\TeacherRepository")
 */
class Teacher
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var boolean $isActive
     *
     * @ORM\Column(name="is_active", type="boolean", nullable=false)
     */
    private $isActive;

    /**
     * @var string $lastName
     *
     * @ORM\Column(name="last_name", type="string", length=50, nullable=false)
     */
    private $lastName;

    /**
     * @var string $firstName
     *
     * @ORM\Column(name="first_name", type="string", length=50, nullable=false)
     */
    private $firstName;

    /**
     * @var string $phoneNumber
     *
     * @ORM\Column(name="phone_number", type="string", length=10, nullable=true)
     */
    private $phoneNumber;

    /**
     * @var string $cellphoneNumber
     *
     * @ORM\Column(name="cellphone_number", type="string", length=10, nullable=true)
     */
    private $cellphoneNumber;

    /**
     * @var string $emailAddress
     *
     * @ORM\Column(name="email_address", type="string", length=50, nullable=true)
     */
    private $emailAddress;

    /**
     * @var string $username
     *
     * @ORM\Column(name="username", type="string", length=50, nullable=false)
     */
    private $username;

    /**
     * @var string $password
     *
     * @ORM\Column(name="password", type="string", length=50, nullable=false)
     */
    private $password;

    /**
     * @var \DateTime $registrationDate
     *
     * @ORM\Column(name="registration_date", type="datetime", nullable=false)
     */
    private $registrationDate;

    /**
     * @var \DateTime $lastConnectionDate
     *
     * @ORM\Column(name="last_connection_date", type="datetime", nullable=true)
     */
    private $lastConnectionDate;

    /**
     * @var integer $fkRoleId
     *
     * @ORM\Column(name="fk_role_id", type="integer", nullable=false)
     */
    private $fkRoleId;


}
