<?php

namespace ERP\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cliente
 *
 * @ORM\Table(name="cliente", indexes={@ORM\Index(name="fk_cliente_cliente_potencial1_idx", columns={"cliente_potencial_id"}), @ORM\Index(name="fk_cliente_contacto1", columns={"contacto_id"})})
 * @ORM\Entity
 */
class Cliente
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=60, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=25, nullable=false)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="nrc", type="string", length=25, nullable=true)
     */
    private $nrc;

    /**
     * @var string
     *
     * @ORM\Column(name="nit", type="string", length=25, nullable=true)
     */
    private $nit;

    /**
     * @var string
     *
     * @ORM\Column(name="correoelectronico", type="string", length=60, nullable=true)
     */
    private $correoelectronico;

    /**
     * @var string
     *
     * @ORM\Column(name="movil", type="string", length=25, nullable=true)
     */
    private $movil;

    /**
     * @var string
     *
     * @ORM\Column(name="pagina_web", type="string", length=80, nullable=true)
     */
    private $paginaWeb;

    /**
     * @var string
     *
     * @ORM\Column(name="referido_por", type="string", length=60, nullable=true)
     */
    private $referidoPor;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255, nullable=true)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=100, nullable=true)
     */
    private $direccion;
    
     /**
     * @var string
     *
     * @ORM\Column(name="categoria", type="string", length=30, nullable=true)
     */
    private $categoria;
    /**
     * @var \ClientePotencial
     *
     * @ORM\ManyToOne(targetEntity="ClientePotencial")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cliente_potencial_id", referencedColumnName="id")
     * })
     */
    private $clientePotencial;
    
    /**
     * @var integer
     * @ORM\Column(name="estado", type="integer", nullable=false) 
     */
    private $estado;
    
     /**
     * @var \Contacto
     *
     * @ORM\ManyToOne(targetEntity="Contacto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contacto_id", referencedColumnName="id")
     * })
     */
    private $contactoId;

    /**
     * @var string
     * @ORM\Column(name="credito", type="string", length=30,  nullable=false) 
     */
    private $credito;
    
     /**
     * @var string
     * @ORM\Column(name="codigo", type="string", length=20,  nullable=false) 
     */
    private $codigo;
    
    
    
    
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
     * Set nombre
     *
     * @param string $nombre
     * @return Cliente
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
     * Set telefono
     *
     * @param string $telefono
     * @return Cliente
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set nrc
     *
     * @param string $nrc
     * @return Cliente
     */
    public function setNrc($nrc)
    {
        $this->nrc = $nrc;

        return $this;
    }

    /**
     * Get nrc
     *
     * @return string 
     */
    public function getNrc()
    {
        return $this->nrc;
    }

    /**
     * Set nit
     *
     * @param string $nit
     * @return Cliente
     */
    public function setNit($nit)
    {
        $this->nit = $nit;

        return $this;
    }

    /**
     * Get nit
     *
     * @return string 
     */
    public function getNit()
    {
        return $this->nit;
    }

    /**
     * Set correoelectronico
     *
     * @param string $correoelectronico
     * @return Cliente
     */
    public function setCorreoelectronico($correoelectronico)
    {
        $this->correoelectronico = $correoelectronico;

        return $this;
    }

    /**
     * Get correoelectronico
     *
     * @return string 
     */
    public function getCorreoelectronico()
    {
        return $this->correoelectronico;
    }

    /**
     * Set movil
     *
     * @param string $movil
     * @return Cliente
     */
    public function setMovil($movil)
    {
        $this->movil = $movil;

        return $this;
    }

    /**
     * Get movil
     *
     * @return string 
     */
    public function getMovil()
    {
        return $this->movil;
    }

    /**
     * Set paginaWeb
     *
     * @param string $paginaWeb
     * @return Cliente
     */
    public function setPaginaWeb($paginaWeb)
    {
        $this->paginaWeb = $paginaWeb;

        return $this;
    }

    /**
     * Get paginaWeb
     *
     * @return string 
     */
    public function getPaginaWeb()
    {
        return $this->paginaWeb;
    }

    /**
     * Set referidoPor
     *
     * @param string $referidoPor
     * @return Cliente
     */
    public function setReferidoPor($referidoPor)
    {
        $this->referidoPor = $referidoPor;

        return $this;
    }

    /**
     * Get referidoPor
     *
     * @return string 
     */
    public function getReferidoPor()
    {
        return $this->referidoPor;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Cliente
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Cliente
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set clientePotencial
     *
     * @param ERP\AdminBundle\Entity\ClientePotencial $clientePotencial
     * @return Cliente
     */
    public function setClientePotencial(\ERP\AdminBundle\Entity\ClientePotencial $clientePotencial = null)
    {
        $this->clientePotencial = $clientePotencial;

        return $this;
    }

    /**
     * Get clientePotencial
     *
     * @return ERP\AdminBundle\Entity\ClientePotencial 
     */
    public function getClientePotencial()
    {
        return $this->clientePotencial;
    }
    
    
    /**
     * Set contactoId
     *
     * @param ERP\AdminBundle\Entity\Contacto $contactoId
     * @return Contacto
     */
    public function setContactoId(\ERP\AdminBundle\Entity\Contacto $contactoId = null)
    {
        $this->contactoId = $contactoId;

        return $this;
    }
    
     /**
     * Get contactoId
     *
     * @return ERP\AdminBundle\Entity\ContactoId
     */
    public function getContactoId()
    {
        return $this->contactoId;
    }
    
    
    
    /**
     * Set estado
     *
     * @param string $estado
     * @return Cliente
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return integer 
     */
    public function getEstado()
    {
        return $this->estado;
    }
    
    
   
    public function __toString() {
        
         return $this->nombre;
    }  
    
     
     /**
     * Set credito
     *
     * @param integer $credito
     * @return Cliente
     */
    public function setCredito($credito)
    {
        $this->credito = $credito;

        return $this;
    }

    /**
     * Get estado
     *
     * @return integer 
     */
    public function getCredito()
    {
        return $this->credito;
    }
    
   
      /**
     * Set categoria
     *
     * @param string $categoria
     * @return Cliente
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return integer 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }
    
      /**
     * Set codigo
     *
     * @param integer $codigo
     * @return Cliente
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get estado
     *
     * @return integer 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }
    
}
