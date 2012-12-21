<?php

namespace Virgule\Bundle\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classroom
 *
 * @ORM\Table(name="classroom")
 * @ORM\Entity(repositoryClass="Virgule\Bundle\MainBundle\Repository\ClassRoomRepository")
 */
class ClassRoom {

    /**
     * @var boolean
     *
     * @ORM\Column(name="id", type="boolean", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="string", length=250, nullable=true)
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity="OrganizationBranch", inversedBy="classRooms")
     * @ORM\JoinColumn(name="fk_organization_branch", referencedColumnName="id")
     */
    private $organizationBranch;

    /**
     * Get id
     *
     * @return boolean 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Classroom
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return Classroom
     */
    public function setComments($comments) {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string 
     */
    public function getComments() {
        return $this->comments;
    }

    /**
     * Set organizationBranch
     *
     * @param \Virgule\Bundle\MainBundle\Entity\organizationBranch $organizationBranch
     * @return ClassRoom
     */
    public function setOrganizationBranch(\Virgule\Bundle\MainBundle\Entity\organizationBranch $organizationBranch = null) {
        $this->organizationBranch = $organizationBranch;

        return $this;
    }

    /**
     * Get organizationBranch
     *
     * @return \Virgule\Bundle\MainBundle\Entity\organizationBranch 
     */
    public function getOrganizationBranch() {
        return $this->organizationBranch;
    }

}