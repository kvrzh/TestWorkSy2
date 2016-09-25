<?php

namespace Test\ContactsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Districts
 *
 * @ORM\Table(name="districts", uniqueConstraints={@ORM\UniqueConstraint(name="id_districts_UNIQUE", columns={"id_districts"})})
 * @ORM\Entity
 */
class Districts
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_districts", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDistricts;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;



    /**
     * Get idDistricts
     *
     * @return integer 
     */
    public function getIdDistricts()
    {
        return $this->idDistricts;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Districts
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

    public function __toString()
    {
        return $this->name;
    }
}
