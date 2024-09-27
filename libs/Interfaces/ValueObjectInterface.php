<?php
declare(strict_types=1);

namespace Budgetcontrol\Library\Interfaces;

interface ValueObjectInterface
{
    /**
     * Creates a new instance of the value object.
     *
     * @param mixed $value The value of the value object.
     * @return self The newly created value object instance.
     */
    public static function create(...$value): self;

    /**
     * Get the value of the value object.
     *
     * @return object The value of the value object.
     */
    public function toJson(): object;

    /**
     * Get the value of the value object.
     *
     * @return string The value of the value object.
     */
    public function __toString(): string;

}