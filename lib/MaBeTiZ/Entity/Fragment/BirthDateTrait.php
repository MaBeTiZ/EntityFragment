<?php

namespace MaBeTiZ\Entity\Fragment;

use DateTime;

/**
 * Trait BirthDateTrait
 * @package MaBeTiZ\Entity\Fragment
 */
trait BirthDateTrait
{
    /**
     * @var DateTime
     */
    private $birthDate;

    /**
     * @return DateTime|null
     */
    public function getBirthDate(): ?DateTime
    {
        return $this->birthDate;
    }

    /**
     * @param DateTime|null $birthDate
     * @return self
     */
    public function setBirthDate(?DateTime $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }
}
