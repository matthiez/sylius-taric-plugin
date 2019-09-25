<?php
declare(strict_types=1);

namespace Ecolos\SyliusTaricPlugin\Entity;

use Doctrine\ORM\Mapping\Column;

trait TaricTrait
{
    /**
     * @Column(type="bigint", length=11, nullable=true)
     * @var int|null
     */
    public $taric;

    public function getTaric(): ?int
    {
        return null === $this->taric || "" === $this->taric ? null : (int)$this->taric; // Doctrine converts bigint to string
    }

    public function setTaric(?int $taric): void
    {
        $this->taric = $taric;
    }
}
