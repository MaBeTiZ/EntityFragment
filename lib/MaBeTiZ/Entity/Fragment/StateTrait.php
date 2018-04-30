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
     * @var array Available states to define in parent entity
     *            /!\ Please do NOT use the 0 key ! (start at 1)
     */
    static protected $availableStates;

    /**
     * @var int
     * @ORM\Column(name="state", type="integer", nullable="false")
     */
    private $state;

    /**
     * Sets state.
     *
     * @param  int|null $state
     * @return self
     * @throws \Exception
     */
    public function setState(?int $state = null): self
    {
        if (!empty($state) && !array_key_exists($state, static::$availableStates)) {
            $statesAsString = implode(', ', array_keys(static::$availableStates));
            throw new Exception("Given state ({$state}) is not in the available states ({$statesAsString}).");
        }

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
}
