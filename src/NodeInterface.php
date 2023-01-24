<?php

declare(strict_types=1);

namespace Setono\HtmlElement;

interface NodeInterface extends \Stringable
{
    public function render(): string;
}
