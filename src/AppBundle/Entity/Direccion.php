<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Direccion
 *
 * @ORM\Table(name="direccion")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DireccionRepository")
 */
class Direccion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="calle", type="string", length=50)
     */
    private $calle;

    /**
     * @var string
     *
     * @ORM\Column(name="colonia", type="string", length=50)
     */
    private $colonia;

    /**
     * @var string
     *
     * @ORM\Column(name="delegacion", type="string", length=50)
     */
    private $delegacion;

    /**
     * @var int
     *
     * @ORM\Column(name="numero", type="integer")
     */
    private $numero;

    // ...

    /**
     * @ORM\OneToMany(targetEntity="Usuario", mappedBy="direccion")
     */
    private $usuarios;

    public function __construct()
    {
        $this->usuarios = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set calle
     *
     * @param string $calle
     *
     * @return Direccion
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;

        return $this;
    }

    /**
     * Get calle
     *
     * @return string
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * Set colonia
     *
     * @param string $colonia
     *
     * @return Direccion
     */
    public function setColonia($colonia)
    {
        $this->colonia = $colonia;

        return $this;
    }

    /**
     * Get colonia
     *
     * @return string
     */
    public function getColonia()
    {
        return $this->colonia;
    }

    /**
     * Set delegacion
     *
     * @param string $delegacion
     *
     * @return Direccion
     */
    public function setDelegacion($delegacion)
    {
        $this->delegacion = $delegacion;

        return $this;
    }

    /**
     * Get delegacion
     *
     * @return string
     */
    public function getDelegacion()
    {
        return $this->delegacion;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     *
     * @return Direccion
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return int
     */
    public function getNumero()
    {
        return $this->numero;
    }

        /**
     * Set usuarios
     *
     * @param string $usuarios
     *
     * @return Direccion
     */
    public function setUsuarios($usuarios)
    {
        $this->usuarios = $usuarios;

        return $this;
    }

    /**
     * Get usuarios
     *
     * @return string
     */
    public function getUsuarios()
    {
        return $this->usuarios;
    }

    public function __toString()
    {
        return $this->calle;
    }
}

