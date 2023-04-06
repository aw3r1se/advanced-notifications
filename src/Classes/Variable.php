<?php

namespace Aw3r1se\LocalizedNotifications\Classes;

use Aw3r1se\LocalizedNotifications\Exceptions\IncorrectEntityProvided;
use Aw3r1se\LocalizedNotifications\Exceptions\RelationDoesntExists;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

abstract class Variable
{
    protected static string $name;

    protected static string $model;

    protected static string $field;

    protected static ?string $access_through = null;

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
     * @param string $value
     * @return $this
     */
    public function setValue(string $value): static
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @param Model $entity
     * @return $this
     * @throws IncorrectEntityProvided
     * @throws RelationDoesntExists
     */
    public function defineValue(Model $entity): static
    {
        if ($this->value) {
            return $this;
        }

        if (!($entity instanceof static::$model)) {
            throw new IncorrectEntityProvided();
        }

        if (static::$access_through) {
            $relation = static::$access_through;
            $entity = $entity->$relation;
            if (is_null($entity)) {
                throw new RelationDoesntExists();
            }
        }

        $value = $entity->getAttributeValue(static::$field);
        $this->value = $this->format($value);

        return $this;
    }

    /**
     * @param mixed $value
     * @return mixed
     */
    protected function format(mixed $value): mixed
    {
        if ($value instanceof Carbon) {
            $value = $value->format('d-m-Y h:i');
        }

        return $value;
    }
}
