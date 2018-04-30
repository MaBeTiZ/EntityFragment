<?php

namespace MaBeTiZ\Entity\Fragment;

use Doctrine\ORM\Mapping as ORM;

/**
 * StatusTrait
 * @package MaBeTiZ\Entity\Fragment
 */
trait StatusTrait
{
    /**
     * @var bool
     * @ORM\Column(name="status", type="boolean", nullable="false")
     */
    private $status;

    /**
     * Sets status.
     *
     * @param  bool|null $status
     * @return self
     */
    public function setStatus(?bool $status = null): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Returns status.
     *
     * @return bool|null
     */
    public function getStatus(): ?bool
    {
        return $this->status;
    }
}
