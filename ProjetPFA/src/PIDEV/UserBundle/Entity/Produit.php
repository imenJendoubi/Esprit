<?php

namespace PIDEV\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass="PIDEV\UserBundle\Repository\ProduitRepository")
 */
class Produit
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_p", type="string", length=255, nullable=false)
     */
    private $nomP;

    /**
     * @var string
     *
     * @ORM\Column(name="desc_p", type="string", length=5000, nullable=false)
     */
    private $descP;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var int
     * @ORM\OneToOne(targetEntity="Media",cascade={"persist"})
     * @ORM\JoinColumn(name="imageP",referencedColumnName="id",onDelete="CASCADE")
     */
    private $imageP;

    /**
     * @var int
     *
     * @ORM\Column(name="qte_stock", type="integer", nullable=false)
     */
    private $qteStock;

    /**
     * @var int
     * @ORM\ManyToOne(targetEntity="categories",cascade={"persist"})
     * @ORM\JoinColumn(name="categorie",referencedColumnName="id",onDelete="CASCADE")
     */
    private $categorie;


    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=5000, nullable=true)
     */
    private $reference;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNomP()
    {
        return $this->nomP;
    }

    /**
     * @param string $nomP
     */
    public function setNomP($nomP)
    {
        $this->nomP = $nomP;
    }

    /**
     * @return string
     */
    public function getDescP()
    {
        return $this->descP;
    }

    /**
     * @param string $descP
     */
    public function setDescP($descP)
    {
        $this->descP = $descP;
    }

    /**
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param float $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return string
     */
    public function getImageP()
    {
        return $this->imageP;
    }

    /**
     * @param string $imageP
     */
    public function setImageP($imageP)
    {
        $this->imageP = $imageP;
    }

    /**
     * @return int
     */
    public function getQteStock()
    {
        return $this->qteStock;
    }

    /**
     * @param int $qteStock
     */
    public function setQteStock($qteStock)
    {
        $this->qteStock = $qteStock;
    }

    /**
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param string $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }







}
