<?php

namespace PIDEV\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Forum
 *
 * @ORM\Table(name="forum")
 * @ORM\Entity
 */
class Forum
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
     * @var string|null
     *
     * @ORM\Column(name="sujet", type="string", length=50, nullable=true)
     */
    private $sujet;

    /**
     * @var string
     *
     * @ORM\Column(name="desc_forum", type="string", length=6000, nullable=false)
     */
    private $descForum;


}
