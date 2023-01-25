<?php

declare(strict_types=1);

namespace Setono\HtmlElement;

/**
 * Intentionally not final so that you can easily extend the class and create presets of your desired HtmlAttributes
 */
class HtmlAttribute implements \Stringable
{
    /** @var list<string> */
    private array $values = [];

    public function __construct(private readonly string $name, int|float|bool|string|\Stringable ...$values)
    {
        foreach ($values as $value) {
            $this->values[] = (string) $value;
        }
    }

    public function withValue(int|float|bool|string|\Stringable ...$values): self
    {
        $new = clone $this;

        foreach ($values as $value) {
            $new->values[] = (string) $value;
        }

        return $new;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function value(): ?string
    {
        if ([] === $this->values) {
            return null;
        }

        return implode(' ', $this->values);
    }

    /**
     * @return list<string>
     */
    public function values(): array
    {
        return $this->values;
    }

    public function render(): string
    {
        $value = $this->value();

        if (null !== $value) {
            return sprintf('%s="%s"', $this->name, $value);
        }

        return $this->name;
    }

    public function __toString(): string
    {
        return $this->render();
    }
}
