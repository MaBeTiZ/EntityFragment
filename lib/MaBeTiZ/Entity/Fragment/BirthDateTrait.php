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
     * @ORM\Column(name="birth_date", type="date", nullable=true)
     */
    private $birthDate;

    /**
     * @var int
     */
    private static $minBirthYear = 1900;

    /**
     * @var int
     */
    private static $maxBirthYear = 2018;

     * @return DateTime|null
     */
    public function getBirthDate(): ?DateTime
    {
        return $this->birthDate;
    }

    /**
     * @param DateTime|null $birthDate
     * @return self
     * @throws Exception
     */
    public function setBirthDate(?DateTime $birthDate): self
    {
        self::validateBirthDate($birthDate);

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
    public function isBirthday(?DateTime $date = null): ?bool
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

    /**
     * @param DateTime|null $birthDate
     * @return bool|null
     * @throws Exception
     */
    public static function validateBirthDate(?DateTime $birthDate): ?bool
    {
        if (is_a($birthDate, 'DateTime')
            && ((int)$birthDate->format('Y') < self::$minBirthYear || (int)$birthDate->format('Y') > self::$maxBirthYear)
        ) {
            $minBirthYear = (string)self::$minBirthYear;
            $maxBirthYear = (string)self::$maxBirthYear;
            throw new Exception("The given birth date ({$birthDate->format('Y-m-d')}) is not valid. It must be between $minBirthYear and $maxBirthYear.");
        }

        return true;
    }
}
