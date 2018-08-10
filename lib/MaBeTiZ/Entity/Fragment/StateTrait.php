<?php

namespace MaBeTiZ\Entity\Fragment;

use Doctrine\ORM\Mapping as ORM;
use Exception;

/**
 * StateTrait
 * @package MaBeTiZ\Entity\Fragment
 */
trait StateTrait
{
    /**
     * @var int
     * @ORM\Column(name="state", type="integer", nullable=true)
     */
    private $state;

    /**
     * @var array Available states to define in parent entity
     *            /!\ This is not a field of the entity
     *            /!\ Please do NOT use the 0 key ! (start at 1)
     */
    static protected $availableStates;

    /**
     * Sets state.
     *
     * @param  int|null $state
     * @return self
     * @throws Exception
     */
    public function setState(?int $state = null): self
    {
        self::validateState($state);

        $this->state = $state;

        return $this;
    }

    /**
     * Returns state.
     *
     * @return int|null
     */
    public function getState(): ?int
    {
        return $this->state;
    }

    /**
     * Validation functions
     */

    /**
     * Returns available states.
     *
     * @return array|null
     */
    public static function getAvailableStates(): ?array
    {
        return static::$availableStates;
    }

    /**
     * @param int|null $state
     * @return bool
     * @throws Exception
     */
    private static function validateState(?int $state): ?bool
    {
        if (!is_null($state) && !array_key_exists($state, static::$availableStates)) {
            $statesAsString = implode(', ', array_keys(static::$availableStates));
            throw new Exception("Given state ($state) is not in the available states ({$statesAsString}).");
        }

        return true;
    }
}
