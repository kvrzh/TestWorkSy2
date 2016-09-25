<?php

namespace Test\ContactsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Streets
 *
 * @ORM\Table(name="streets", uniqueConstraints={@ORM\UniqueConstraint(name="idstreets_UNIQUE", columns={"id_streets"})})
 * @ORM\Entity
 */
class Streets
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_streets", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idStreets;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="district", type="integer", nullable=false)
     */
    private $district;



    /**
     * Get idStreets
     *
     * @return integer 
     */
    public function getIdStreets()
    {
        return $this->idStreets;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Streets
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
     * @param integer $district
     * @return Streets
     */
    public function setDistrict($district)
    {
        $this->district = $district;

        return $this;
    }

    /**
     * Get district
     *
     * @return integer 
     */
    public function getDistrict()
    {
        return $this->district;
    }

    public function __toString()
    {
        return $this->name;
    }
}
