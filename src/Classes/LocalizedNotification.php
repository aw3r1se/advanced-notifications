<?php

namespace Aw3r1se\LocalizedNotifications\Classes;

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

    public function getContent()
    {
        //$this->message::getContents();
    }
}
