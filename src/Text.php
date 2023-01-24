<?php

declare(strict_types=1);

namespace Setono\HtmlElement;

final class Text implements NodeInterface
{
    public function __construct(private readonly string $value)
    {
    }

    public function __toString(): string
    {
        return $this->render();
    }

    public function render(): string
    {
        return $this->value;
    }
}
