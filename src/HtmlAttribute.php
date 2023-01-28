<?php

declare(strict_types=1);

namespace Setono\HtmlElement;

final class HtmlAttribute implements \Stringable
{
    private ?string $value = null;

    public function __construct(private readonly string $name, int|float|bool|string|\Stringable $value = null)
    {
        if (null !== $value) {
            $this->value = self::castToString($value);
        }
    }

    public function withValue(int|float|bool|string|\Stringable $value = null, bool $overwrite = true): self
    {
        $new = clone $this;
        $value = self::castToString($value);
        $new->value = $overwrite ? $value : ((string) $new->value . ' ' . $value);

        return $new;
    }

    public function removeValue(string $value): self
    {
        if (!$this->hasValue()) {
            return $this;
        }

        $new = clone $this;
        $new->value = trim(str_replace([$value, '  '], ['', ' '], (string) $new->value));

        return $new;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function value(): ?string
    {
        return $this->value;
    }

    /**
     * @psalm-assert-if-true !null $this->value()
     * @psalm-assert-if-true non-empty-string $this->value()
     * @psalm-assert-if-true !null $this->value
     * @psalm-assert-if-true non-empty-string $this->value
     */
    public function hasValue(): bool
    {
        return null !== $this->value && '' !== $this->value;
    }

    public function render(): string
    {
        if ($this->hasValue()) {
            return sprintf('%s="%s"', $this->name, $this->value);
        }

        return $this->name;
    }

    public function __toString(): string
    {
        return $this->render();
    }

    private static function castToString(null|int|float|bool|string|\Stringable $value): string
    {
        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        }

        return (string) $value;
    }
}
