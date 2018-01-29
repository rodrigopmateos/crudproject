<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UsuarioRepository")
 */
class Usuario
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
     * @ORM\Column(name="nombre", type="string", length=50)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="ape_paterno", type="string", length=50)
     */
    private $apePaterno;

    /**
     * @var string
     *
     * @ORM\Column(name="ape_materno", type="string", length=50)
     */
    private $apeMaterno;

    /**
     * @var int
     *
     * @ORM\Column(name="edad", type="integer")
     */
    private $edad;

    // ...

    /**
     * @ORM\ManyToOne(targetEntity="Direccion", inversedBy="usuarios")
     * @ORM\JoinColumn(name="direccion_id", referencedColumnName="id")
     */
    private $direccion;

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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Usuario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apePaterno
     *
     * @param string $apePaterno
     *
     * @return Usuario
     */
    public function setApePaterno($apePaterno)
    {
        $this->apePaterno = $apePaterno;

        return $this;
    }

    /**
     * Get apePaterno
     *
     * @return string
     */
    public function getApePaterno()
    {
        return $this->apePaterno;
    }

    /**
     * Set apeMaterno
     *
     * @param string $apeMaterno
     *
     * @return Usuario
     */
    public function setApeMaterno($apeMaterno)
    {
        $this->apeMaterno = $apeMaterno;

        return $this;
    }

    /**
     * Get apeMaterno
     *
     * @return string
     */
    public function getApeMaterno()
    {
        return $this->apeMaterno;
    }

    /**
     * Set edad
     *
     * @param integer $edad
     *
     * @return Usuario
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * Get edad
     *
     * @return int
     */
    public function getEdad()
    {
        return $this->edad;
    }

        /**
     * Set direccion
     *
     * @param int $direccion
     *
     * @return Usuario
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return int
     */
    public function getDireccion()
    {
        return $this->direccion;
    }
}

