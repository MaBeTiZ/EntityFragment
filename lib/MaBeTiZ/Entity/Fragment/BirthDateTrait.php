<?php

namespace MaBeTiZ\Entity\Fragment;

use DateInterval;
use DateTime;
use Exception;

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

    /**
     * Additional functions
     */

    /**
     * @return DateInterval|null
     */
    public function getAge(): ?DateInterval
    {
        if (is_a($this->birthDate, 'DateTime')) {
            return $this->birthDate->diff(new DateTime('now'));
        }

        return null;
    }

    /**
     * @param DateTime|null $date If null, checking for today.
     * @return bool|null bool(true): "yes", bool(false): "no", null: "don't know".
     */
    public function isBirthday(?DateTime $date): ?bool
    {
        if (is_null($date)) {
            $date = new DateTime('now');
        }

        if (is_a($this->birthDate, 'DateTime')) {
            return
                $this->birthDate->format('d') === $date->format('d')
                && $this->birthDate->format('m') === $date->format('m');
        }

        return null;
    }
}
