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
    protected const VOID_ELEMENTS = [
        'area', 'base', 'br', 'col', 'embed', 'hr', 'img', 'input', 'link', 'meta', 'param', 'source', 'track', 'wbr',
    ];

    /**
     * Is true if the HtmlElement does not have a closing tag, i.e. is a void element
     */
    private bool $void;

    /** @var array<string, HtmlAttribute> */
    private array $attributes = [];

    /** @var list<NodeInterface> */
    private array $children = [];

    public function __construct(private readonly string $tag, string|NodeInterface ...$children)
    {
        $this->void = in_array($this->tag, self::VOID_ELEMENTS, true);

        if ($this->void && [] !== $children) {
            throw new \RuntimeException(sprintf('You are trying to append an element to a void HTML tag (%s)', $this->tag));
        }

        foreach ($children as $child) {
            $this->children[] = is_string($child) ? new Text($child) : $child;
        }
    }

    public function withAttribute(string|HtmlAttribute $attribute, int|float|bool|string|\Stringable ...$values): self
    {
        $new = clone $this;

        $name = $attribute instanceof HtmlAttribute ? $attribute->name() : $attribute;

        if (!isset($new->attributes[$name])) {
            $new->attributes[$name] = new HtmlAttribute($name);
        }

        if ($attribute instanceof HtmlAttribute) {
            $new->attributes[$name] = $new->attributes[$name]->withValue(...$attribute->values());
        }

        $new->attributes[$name] = $new->attributes[$name]->withValue(...$values);

        return $new;
    }

    public function withClass(int|float|bool|string|\Stringable ...$classes): self
    {
        return $this->withAttribute('class', ...$classes);
    }

    public function render(): string
    {
        return $this->renderStart() . $this->renderChildren() . $this->renderEnd();
    }

    public function renderStart(): string
    {
        return sprintf(
            '<%s%s>',
            $this->tag,
            [] === $this->attributes ? '' : ' ' . implode(' ', $this->attributes),
        );
    }

    public function renderChildren(): string
    {
        if ($this->void) {
            return '';
        }

        return implode('', $this->children);
    }

    public function renderEnd(): string
    {
        if ($this->void) {
            return '';
        }

        return sprintf('</%s>', $this->tag);
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
        if (static::class !== self::class) {
            throw new \RuntimeException(sprintf('It is only possible to use the magic element methods on the root class %s', self::class));
        }

        return new self($name, ...$arguments);
    }
}
