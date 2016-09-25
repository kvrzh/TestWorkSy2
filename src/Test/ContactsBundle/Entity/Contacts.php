<?php

namespace Test\ContactsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contacts
 *
 * @ORM\Table(name="contacts", uniqueConstraints={@ORM\UniqueConstraint(name="id_contacts_UNIQUE", columns={"id_contacts"})}, indexes={@ORM\Index(name="id_districts_idx", columns={"district"}), @ORM\Index(name="street_idx", columns={"street"})})
 * @ORM\Entity
 */
class Contacts
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_contacts", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idContacts;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var \Districts
     *
     * @ORM\ManyToOne(targetEntity="Districts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="district", referencedColumnName="id_districts")
     * })
     */
    private $district;

    /**
     * @var \Streets
     *
     * @ORM\ManyToOne(targetEntity="Streets")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="street", referencedColumnName="id_streets")
     * })
     */
    private $street;



    /**
     * Get idContacts
     *
     * @return integer 
     */
    public function getIdContacts()
    {
        return $this->idContacts;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Contacts
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set district
     *
     * @param \Test\ContactsBundle\Entity\Districts $district
     * @return Contacts
     */
    public function setDistrict(\Test\ContactsBundle\Entity\Districts $district = null)
    {
        $this->district = $district;

        return $this;
    }

    /**
     * Get district
     *
     * @return \Test\ContactsBundle\Entity\Districts 
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Set street
     *
     * @param \Test\ContactsBundle\Entity\Streets $street
     * @return Contacts
     */
    public function setStreet(\Test\ContactsBundle\Entity\Streets $street = null)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return \Test\ContactsBundle\Entity\Streets 
     */
    public function getStreet()
    {
        return $this->street;
    }
}
