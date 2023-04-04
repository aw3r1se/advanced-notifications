<?php

namespace Aw3r1se\LocalizedNotifications\Enums\Contracts;

interface HasMatchInterface
{
    public static function match(string $locale): static;
}
