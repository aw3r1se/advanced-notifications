<?php

namespace Aw3r1se\LocalizedNotifications\Classes;

use Aw3r1se\LocalizedNotifications\Exceptions\IncorrectEntityProvided;
use Illuminate\Database\Eloquent\Model;

abstract class Variable
{
    protected static string $name;

    protected static string $model;

    protected static string $field;

    protected ?string $value = null;

    /**
     * @return string
     */
    public static function getName(): string
    {
        return static::$name;
    }

    /**
     * @return string
     */
    public static function getModel(): string
    {
        return static::$model;
    }

    /**
     * @return string
     */
    public static function getField(): string
    {
        return static::$field;
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param Model $entity
     * @return $this
     * @throws IncorrectEntityProvided
     */
    public function defineValue(Model $entity): static
    {
        if (!($entity instanceof static::$model)) {
            throw new IncorrectEntityProvided();
        }

        $this->value = $entity->getAttributeValue(static::$field);

        return $this;
    }
}
