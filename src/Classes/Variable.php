<?php

namespace Aw3r1se\LocalizedNotifications\Classes;

abstract class Variable
{
    protected static string $name;

    protected static string $model;

    protected static string $field;

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
}
