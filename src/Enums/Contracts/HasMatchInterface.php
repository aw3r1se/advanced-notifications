<?php

namespace Aw3r1se\AdvancedNotifications\Enums\Contracts;

interface HasMatchInterface
{
    public static function match(string $locale): static;
}
