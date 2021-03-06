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
     * @ORM\Column(name="status", type="boolean", nullable=true)
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

    /**
     * Aliasing
     */

    public function enable(): self
    {
        $this->status = true;

        return $this;
    }

    public function disable(): self
    {
        $this->status = false;

        return $this;
    }

    public function isEnabled(): ?bool
    {
        return $this->status;
    }
}
