<?php

declare(strict_types=1);

namespace Setono\HtmlElement;

/**
 * todo create phpdoc for all available html elements: https://developer.mozilla.org/en-US/docs/Web/HTML/Element
 *
 * @method static self div(string|NodeInterface ...$children)
 * @method static self p(string|NodeInterface ...$children)
 *
 * Intentionally not final so that you can easily extend the class and create presets of your desired HtmlElements
 */
class HtmlElement implements NodeInterface
{
    // See https://developer.mozilla.org/en-US/docs/Glossary/Void_element
    public const VOID_ELEMENTS = [
        'area', 'base', 'br', 'col', 'embed', 'hr', 'img', 'input', 'link', 'meta', 'param', 'source', 'track', 'wbr',
    ];

    /**
     * Is true if the HtmlElement has an end tag
     */
    private bool $void;

    /** @var array<string, HtmlAttribute> */
    private array $attributes = [];

    /** @var list<NodeInterface> */
    private array $children;

    private function __construct(private readonly string $tag, string|NodeInterface ...$children)
    {
        $this->void = in_array($this->tag, self::VOID_ELEMENTS, true);

        // todo this is not beautiful...
        $this->children = $this->append(...$children)->children();
    }

    public static function new(string $tag, string|NodeInterface ...$children): self
    {
        return new self($tag, ...$children);
    }

    public function append(string|NodeInterface ...$children): self
    {
        if ($this->void) {
            throw new \RuntimeException(sprintf('You are trying to append an element to a void HTML tag (%s)', $this->tag));
        }

        $new = clone $this;

        foreach ($children as $child) {
            if (is_string($child)) {
                $child = new Text($child);
            }

            $new->children[] = $child;
        }

        return $new;
    }

    public function withAttribute(string $name, int|float|bool|string|\Stringable ...$values): self
    {
        $new = clone $this;
        if (!isset($new->attributes[$name])) {
            $new->attributes[$name] = HtmlAttribute::new($name);
        }

        $new->attributes[$name] = $new->attributes[$name]->withValues(...$values);

        return $new;
    }

    /**
     * @return list<NodeInterface>
     */
    public function children(): array
    {
        return $this->children;
    }

    public function render(): string
    {
        $html = sprintf(
            '<%s%s>',
            $this->tag,
            [] === $this->attributes ? '' : ' ' . implode(' ', $this->attributes),
        );

        if ($this->void) {
            return $html;
        }

        return sprintf('%s%s</%s>', $html, implode('', $this->children), $this->tag);
    }

    public function __toString(): string
    {
        return $this->render();
    }

    /**
     * @param array<array-key, string|NodeInterface> $arguments
     */
    public static function __callStatic(string $name, array $arguments): self
    {
        return new self($name, ...$arguments);
    }
}
