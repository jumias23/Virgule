<?php

namespace Virgule\Bundle\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Virgule\Bundle\MainBundle\Entity\Student
 *
 * @ORM\Table(name="student")
 * @ORM\Entity
 */
class Student
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
     * @var \DateTime $registrationDate
     *
     * @ORM\Column(name="registration_date", type="datetime", nullable=false)
     */
    private $registrationDate;

    /**
     * @var string $lastname
     *
     * @ORM\Column(name="lastname", type="string", length=50, nullable=false)
     */
    private $lastname;

    /**
     * @var string $firstname
     *
     * @ORM\Column(name="firstname", type="string", length=50, nullable=false)
     */
    private $firstname;

    /**
     * @var \DateTime $birthdate
     *
     * @ORM\Column(name="birthdate", type="date", nullable=true)
     */
    private $birthdate;

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
     * @var string $address
     *
     * @ORM\Column(name="address", type="string", length=50, nullable=true)
     */
    private $address;

    /**
     * @var string $zipcode
     *
     * @ORM\Column(name="zipcode", type="string", length=10, nullable=true)
     */
    private $zipcode;

    /**
     * @var string $city
     *
     * @ORM\Column(name="city", type="string", length=50, nullable=true)
     */
    private $city;

    /**
     * @var string $gender
     *
     * @ORM\Column(name="gender", type="string", length=1, nullable=true)
     */
    private $gender;

    /**
     * @var string $nationality
     *
     * @ORM\Column(name="nationality", type="string", length=50, nullable=true)
     */
    private $nationality;

    /**
     * @var string $maritalStatus
     *
     * @ORM\Column(name="marital_status", type="string", length=20, nullable=true)
     */
    private $maritalStatus;

    /**
     * @var string $commentaires
     *
     * @ORM\Column(name="commentaires", type="text", nullable=true)
     */
    private $commentaires;

    /**
     * @var \DateTime $registringDate
     *
     * @ORM\Column(name="registring_date", type="date", nullable=false)
     */
    private $registringDate;

    /**
     * @var string $picturePath
     *
     * @ORM\Column(name="picture_path", type="string", length=50, nullable=true)
     */
    private $picturePath;

    /**
     * @var \DateTime $arrivalDate
     *
     * @ORM\Column(name="arrival_date", type="date", nullable=true)
     */
    private $arrivalDate;

    /**
     * @var boolean $scholarized
     *
     * @ORM\Column(name="scholarized", type="boolean", nullable=true)
     */
    private $scholarized;

    /**
     * @var string $profession
     *
     * @ORM\Column(name="profession", type="string", length=45, nullable=true)
     */
    private $profession;

    /**
     * @var boolean $scholarizedInTheCountry
     *
     * @ORM\Column(name="scholarized_in_the_country", type="boolean", nullable=true)
     */
    private $scholarizedInTheCountry;

    /**
     * @var boolean $scholarizedInAForeignCountry
     *
     * @ORM\Column(name="scholarized_in_a foreign_country", type="boolean", nullable=true)
     */
    private $scholarizedInAForeignCountry;

    /**
     * @var boolean $scholarizationLevel
     *
     * @ORM\Column(name="scholarization_level", type="boolean", nullable=true)
     */
    private $scholarizationLevel;

    /**
     * @var string $emergencyContactLastname
     *
     * @ORM\Column(name="emergency_contact_lastname", type="string", length=45, nullable=true)
     */
    private $emergencyContactLastname;

    /**
     * @var string $emergencyContactFirstname
     *
     * @ORM\Column(name="emergency_contact_firstname", type="string", length=45, nullable=true)
     */
    private $emergencyContactFirstname;

    /**
     * @var string $emergencyContactPhoneNumber
     *
     * @ORM\Column(name="emergency_contact_phone_number", type="string", length=45, nullable=true)
     */
    private $emergencyContactPhoneNumber;

    /**
     * @var string $emergencyContactConnectionType
     *
     * @ORM\Column(name="emergency_contact_connection_type", type="string", length=45, nullable=true)
     */
    private $emergencyContactConnectionType;

    /**
     * @var Country
     *
     * @ORM\ManyToOne(targetEntity="Country")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_native_country_id", referencedColumnName="id")
     * })
     */
    private $fkNativeCountry;

    /**
     * @var Teacher
     *
     * @ORM\ManyToOne(targetEntity="Teacher")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_welcomed_by_teacher_id", referencedColumnName="id")
     * })
     */
    private $fkWelcomedByTeacher;

    /**
     * @var Language
     *
     * @ORM\ManyToOne(targetEntity="Language")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_mother_tongue_id", referencedColumnName="id")
     * })
     */
    private $fkMotherTongue;

    /**
     * @var Language
     *
     * @ORM\ManyToOne(targetEntity="Language")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_scholarization_language_id", referencedColumnName="id")
     * })
     */
    private $fkScholarizationLanguage;

    /**
     * @var ClassLevel
     *
     * @ORM\ManyToOne(targetEntity="ClassLevel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_proposed_level_id", referencedColumnName="id")
     * })
     */
    private $fkProposedLevel;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set registrationDate
     *
     * @param \DateTime $registrationDate
     * @return Student
     */
    public function setRegistrationDate($registrationDate)
    {
        $this->registrationDate = $registrationDate;
    
        return $this;
    }

    /**
     * Get registrationDate
     *
     * @return \DateTime 
     */
    public function getRegistrationDate()
    {
        return $this->registrationDate;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Student
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    
        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return Student
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    
        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     * @return Student
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    
        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime 
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     * @return Student
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    
        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string 
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set cellphoneNumber
     *
     * @param string $cellphoneNumber
     * @return Student
     */
    public function setCellphoneNumber($cellphoneNumber)
    {
        $this->cellphoneNumber = $cellphoneNumber;
    
        return $this;
    }

    /**
     * Get cellphoneNumber
     *
     * @return string 
     */
    public function getCellphoneNumber()
    {
        return $this->cellphoneNumber;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Student
     */
    public function setAddress($address)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set zipcode
     *
     * @param string $zipcode
     * @return Student
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    
        return $this;
    }

    /**
     * Get zipcode
     *
     * @return string 
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Student
     */
    public function setCity($city)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return Student
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    
        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set nationality
     *
     * @param string $nationality
     * @return Student
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;
    
        return $this;
    }

    /**
     * Get nationality
     *
     * @return string 
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * Set maritalStatus
     *
     * @param string $maritalStatus
     * @return Student
     */
    public function setMaritalStatus($maritalStatus)
    {
        $this->maritalStatus = $maritalStatus;
    
        return $this;
    }

    /**
     * Get maritalStatus
     *
     * @return string 
     */
    public function getMaritalStatus()
    {
        return $this->maritalStatus;
    }

    /**
     * Set commentaires
     *
     * @param string $commentaires
     * @return Student
     */
    public function setCommentaires($commentaires)
    {
        $this->commentaires = $commentaires;
    
        return $this;
    }

    /**
     * Get commentaires
     *
     * @return string 
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }

    /**
     * Set registringDate
     *
     * @param \DateTime $registringDate
     * @return Student
     */
    public function setRegistringDate($registringDate)
    {
        $this->registringDate = $registringDate;
    
        return $this;
    }

    /**
     * Get registringDate
     *
     * @return \DateTime 
     */
    public function getRegistringDate()
    {
        return $this->registringDate;
    }

    /**
     * Set picturePath
     *
     * @param string $picturePath
     * @return Student
     */
    public function setPicturePath($picturePath)
    {
        $this->picturePath = $picturePath;
    
        return $this;
    }

    /**
     * Get picturePath
     *
     * @return string 
     */
    public function getPicturePath()
    {
        return $this->picturePath;
    }

    /**
     * Set arrivalDate
     *
     * @param \DateTime $arrivalDate
     * @return Student
     */
    public function setArrivalDate($arrivalDate)
    {
        $this->arrivalDate = $arrivalDate;
    
        return $this;
    }

    /**
     * Get arrivalDate
     *
     * @return \DateTime 
     */
    public function getArrivalDate()
    {
        return $this->arrivalDate;
    }

    /**
     * Set scholarized
     *
     * @param boolean $scholarized
     * @return Student
     */
    public function setScholarized($scholarized)
    {
        $this->scholarized = $scholarized;
    
        return $this;
    }

    /**
     * Get scholarized
     *
     * @return boolean 
     */
    public function getScholarized()
    {
        return $this->scholarized;
    }

    /**
     * Set profession
     *
     * @param string $profession
     * @return Student
     */
    public function setProfession($profession)
    {
        $this->profession = $profession;
    
        return $this;
    }

    /**
     * Get profession
     *
     * @return string 
     */
    public function getProfession()
    {
        return $this->profession;
    }

    /**
     * Set scholarizedInTheCountry
     *
     * @param boolean $scholarizedInTheCountry
     * @return Student
     */
    public function setScholarizedInTheCountry($scholarizedInTheCountry)
    {
        $this->scholarizedInTheCountry = $scholarizedInTheCountry;
    
        return $this;
    }

    /**
     * Get scholarizedInTheCountry
     *
     * @return boolean 
     */
    public function getScholarizedInTheCountry()
    {
        return $this->scholarizedInTheCountry;
    }

    /**
     * Set scholarizedInAForeignCountry
     *
     * @param boolean $scholarizedInAForeignCountry
     * @return Student
     */
    public function setScholarizedInAForeignCountry($scholarizedInAForeignCountry)
    {
        $this->scholarizedInAForeignCountry = $scholarizedInAForeignCountry;
    
        return $this;
    }

    /**
     * Get scholarizedInAForeignCountry
     *
     * @return boolean 
     */
    public function getScholarizedInAForeignCountry()
    {
        return $this->scholarizedInAForeignCountry;
    }

    /**
     * Set scholarizationLevel
     *
     * @param boolean $scholarizationLevel
     * @return Student
     */
    public function setScholarizationLevel($scholarizationLevel)
    {
        $this->scholarizationLevel = $scholarizationLevel;
    
        return $this;
    }

    /**
     * Get scholarizationLevel
     *
     * @return boolean 
     */
    public function getScholarizationLevel()
    {
        return $this->scholarizationLevel;
    }

    /**
     * Set emergencyContactLastname
     *
     * @param string $emergencyContactLastname
     * @return Student
     */
    public function setEmergencyContactLastname($emergencyContactLastname)
    {
        $this->emergencyContactLastname = $emergencyContactLastname;
    
        return $this;
    }

    /**
     * Get emergencyContactLastname
     *
     * @return string 
     */
    public function getEmergencyContactLastname()
    {
        return $this->emergencyContactLastname;
    }

    /**
     * Set emergencyContactFirstname
     *
     * @param string $emergencyContactFirstname
     * @return Student
     */
    public function setEmergencyContactFirstname($emergencyContactFirstname)
    {
        $this->emergencyContactFirstname = $emergencyContactFirstname;
    
        return $this;
    }

    /**
     * Get emergencyContactFirstname
     *
     * @return string 
     */
    public function getEmergencyContactFirstname()
    {
        return $this->emergencyContactFirstname;
    }

    /**
     * Set emergencyContactPhoneNumber
     *
     * @param string $emergencyContactPhoneNumber
     * @return Student
     */
    public function setEmergencyContactPhoneNumber($emergencyContactPhoneNumber)
    {
        $this->emergencyContactPhoneNumber = $emergencyContactPhoneNumber;
    
        return $this;
    }

    /**
     * Get emergencyContactPhoneNumber
     *
     * @return string 
     */
    public function getEmergencyContactPhoneNumber()
    {
        return $this->emergencyContactPhoneNumber;
    }

    /**
     * Set emergencyContactConnectionType
     *
     * @param string $emergencyContactConnectionType
     * @return Student
     */
    public function setEmergencyContactConnectionType($emergencyContactConnectionType)
    {
        $this->emergencyContactConnectionType = $emergencyContactConnectionType;
    
        return $this;
    }

    /**
     * Get emergencyContactConnectionType
     *
     * @return string 
     */
    public function getEmergencyContactConnectionType()
    {
        return $this->emergencyContactConnectionType;
    }

    /**
     * Set fkNativeCountry
     *
     * @param Virgule\Bundle\MainBundle\Entity\Country $fkNativeCountry
     * @return Student
     */
    public function setFkNativeCountry(\Virgule\Bundle\MainBundle\Entity\Country $fkNativeCountry = null)
    {
        $this->fkNativeCountry = $fkNativeCountry;
    
        return $this;
    }

    /**
     * Get fkNativeCountry
     *
     * @return Virgule\Bundle\MainBundle\Entity\Country 
     */
    public function getFkNativeCountry()
    {
        return $this->fkNativeCountry;
    }

    /**
     * Set fkWelcomedByTeacher
     *
     * @param Virgule\Bundle\MainBundle\Entity\Teacher $fkWelcomedByTeacher
     * @return Student
     */
    public function setFkWelcomedByTeacher(\Virgule\Bundle\MainBundle\Entity\Teacher $fkWelcomedByTeacher = null)
    {
        $this->fkWelcomedByTeacher = $fkWelcomedByTeacher;
    
        return $this;
    }

    /**
     * Get fkWelcomedByTeacher
     *
     * @return Virgule\Bundle\MainBundle\Entity\Teacher 
     */
    public function getFkWelcomedByTeacher()
    {
        return $this->fkWelcomedByTeacher;
    }

    /**
     * Set fkMotherTongue
     *
     * @param Virgule\Bundle\MainBundle\Entity\Language $fkMotherTongue
     * @return Student
     */
    public function setFkMotherTongue(\Virgule\Bundle\MainBundle\Entity\Language $fkMotherTongue = null)
    {
        $this->fkMotherTongue = $fkMotherTongue;
    
        return $this;
    }

    /**
     * Get fkMotherTongue
     *
     * @return Virgule\Bundle\MainBundle\Entity\Language 
     */
    public function getFkMotherTongue()
    {
        return $this->fkMotherTongue;
    }

    /**
     * Set fkScholarizationLanguage
     *
     * @param Virgule\Bundle\MainBundle\Entity\Language $fkScholarizationLanguage
     * @return Student
     */
    public function setFkScholarizationLanguage(\Virgule\Bundle\MainBundle\Entity\Language $fkScholarizationLanguage = null)
    {
        $this->fkScholarizationLanguage = $fkScholarizationLanguage;
    
        return $this;
    }

    /**
     * Get fkScholarizationLanguage
     *
     * @return Virgule\Bundle\MainBundle\Entity\Language 
     */
    public function getFkScholarizationLanguage()
    {
        return $this->fkScholarizationLanguage;
    }

    /**
     * Set fkProposedLevel
     *
     * @param Virgule\Bundle\MainBundle\Entity\ClassLevel $fkProposedLevel
     * @return Student
     */
    public function setFkProposedLevel(\Virgule\Bundle\MainBundle\Entity\ClassLevel $fkProposedLevel = null)
    {
        $this->fkProposedLevel = $fkProposedLevel;
    
        return $this;
    }

    /**
     * Get fkProposedLevel
     *
     * @return Virgule\Bundle\MainBundle\Entity\ClassLevel 
     */
    public function getFkProposedLevel()
    {
        return $this->fkProposedLevel;
    }
}