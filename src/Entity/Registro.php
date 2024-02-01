<?php

namespace App\Entity;

use App\Repository\RegistroRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Gedmo\Mapping\Annotation as Gedmo;



/**
 * @ORM\Entity(repositoryClass=RegistroRepository::class)
 * @ORM\HasLifecycleCallbacks
 * @UniqueEntity(
 *     fields={"correo"},
 *     errorPath="correo",
 *     message="Este correo ya está siendo utilizado"
 * )
 */
class Registro
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=100, unique=true)
     * @Gedmo\Slug(fields={"nombre", "id"}, updatable=false)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $nombre;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank()
     */
    private $nacimiento;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $etapa;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $profesor;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $pais;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $publicaciones;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $proyectos;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $viaje;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.")
     * @Assert\NotBlank()
     */
    private $correo;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comentarios;

    public function getCorreo(): ?string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo): self
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getViaje()
    {
        return $this->viaje;
    }

    /**
     * @param mixed $viaje
     */
    public function setViaje($viaje): void
    {
        $this->viaje = $viaje;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProyectos()
    {
        return $this->proyectos;
    }

    /**
     * @param mixed $proyectos
     */
    public function setProyectos($proyectos): void
    {
        $this->proyectos = $proyectos;
    }

    /**
     * @return mixed
     */
    public function getPublicaciones()
    {
        return $this->publicaciones;
    }

    /**
     * @param mixed $publicaciones
     */
    public function setPublicaciones($publicaciones): void
    {
        $this->publicaciones = $publicaciones;
    }

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $monto;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $modified;


    /**
     * @return mixed
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * @param mixed $monto
     */
    public function setMonto($monto): void
    {
        $this->monto = $monto;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * @param mixed $pais
     */
    public function setPais($pais): void
    {
        $this->pais = $pais;
    }

    /**
     * @return mixed
     */
    public function getProfesor()
    {
        return $this->profesor;
    }

    /**
     * @param mixed $profesor
     */
    public function setProfesor($profesor): void
    {
        $this->profesor = $profesor;
    }

    /**
     * @return mixed
     */
    public function getEtapa()
    {
        return $this->etapa;
    }

    /**
     * @param mixed $etapa
     */
    public function setEtapa($etapa): void
    {
        $this->etapa = $etapa;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created): void
    {
        $this->created = $created;
    }

    /**
     * @return mixed
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @param mixed $modified
     */
    public function setModified($modified): void
    {
        $this->modified = $modified;
    }

    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $this->setCreated(new \DateTime());
        $this->setModified(new \DateTime());
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $this->setModified(new \DateTime());
    }

    public function getComentarios(): ?string
    {
        return $this->comentarios;
    }

    public function setComentarios(?string $comentarios): self
    {
        $this->comentarios = $comentarios;

        return $this;
    }

    public function getNacimiento(): ?\DateTimeInterface
    {
        return $this->nacimiento;
    }

    public function setNacimiento(\DateTimeInterface $nacimiento): self
    {
        $this->nacimiento = $nacimiento;

        return $this;
    }
}
