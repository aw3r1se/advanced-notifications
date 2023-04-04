<?php

namespace Aw3r1se\LocalizedNotifications\Classes;

use Aw3r1se\LocalizedNotifications\Enums\Contracts\LocaleEnumInterface;
use Aw3r1se\LocalizedNotifications\Enums\LocaleEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notification;

abstract class LocalizedNotification extends Notification
{
    protected Message $message;

    /**
     * @var array<Model>
     */
    protected array $entities = [];

    /**
     * @return array<Model>
     */
    public function getEntities(): array
    {
        return $this->entities;
    }

    /**
     * @param Model $model
     * @return $this
     */
    public function add(Model $model): static
    {
        $this->entities[] = $model;

        return $this;
    }

    public function get(): array
    {
        $locale = LocaleEnum::match($this->locale);

        return $this->message->translate($locale);
    }
}
