<?php

namespace Aw3r1se\AdvancedNotifications\Classes;

use Aw3r1se\AdvancedNotifications\Enums\Contracts\ContentTypeEnumInterface;
use Aw3r1se\AdvancedNotifications\Enums\LocaleEnum;
use Aw3r1se\AdvancedNotifications\Exceptions\IncorrectEntityProvided;
use Aw3r1se\AdvancedNotifications\Exceptions\IncorrectMessageException;
use Aw3r1se\AdvancedNotifications\Exceptions\RelationDoesntExists;
use Aw3r1se\AdvancedNotifications\Models\MessageContent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notification;

abstract class AdvancedNotification extends Notification
{
    protected Message $message;

    /**
     * @var array<Model>
     */
    protected array $entities = [];

    /**
     * @var Collection<MessageContent>|null
     */
    protected ?Collection $contents = null;

    /**
     * @param string $message_class
     * @throws IncorrectMessageException
     */
    public function __construct(string $message_class)
    {
        $message = new $message_class;
        if (!($message instanceof Message)) {
            throw new IncorrectMessageException();
        }
        $this->message = new $message_class;
    }

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
     * @throws IncorrectEntityProvided
     * @throws RelationDoesntExists
     */
    public function add(Model $model): static
    {
        $this->entities[] = $model;
        foreach ($this->message->getVariables() as $variable) {
            if ($model instanceof ($variable::getModel())) {
                $variable->defineValue($model);
            }
        }

        return $this;
    }

    /**
     * @param string $variable_class
     * @param mixed $value
     * @return AdvancedNotification
     */
    public function setVariableValue(string $variable_class, mixed $value): static
    {
        $variables = $this->message->getVariables();
        foreach ($variables as $variable) {
            if (is_a($variable, $variable_class)) {
                $variable->setValue($value);
            }
        }

        return $this;
    }

    /**
     * @param ContentTypeEnumInterface $type
     * @return string|null
     */
    public function getByType(ContentTypeEnumInterface $type): ?string
    {
        if (is_null($this->contents)) {
            $this->translate();
        }

        return $this->contents
            ->firstWhere('type', $type->name())
            ?->content;
    }

    /**
     * @return void
     */
    protected function translate(): void
    {
        $locale = LocaleEnum::match($this->locale);

        $this->contents = $this->message->translate($locale);
    }
}
