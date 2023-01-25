<?php

declare(strict_types=1);

namespace Setono\HtmlElement;

/**
 * Document metadata
 * ---
 *
 * @method static self base(string|NodeInterface ...$children)
 * @method static self head(string|NodeInterface ...$children)
 * @method static self link(string|NodeInterface ...$children)
 * @method static self meta(string|NodeInterface ...$children)
 * @method static self style(string|NodeInterface ...$children)
 * @method static self title(string|NodeInterface ...$children)
 *
 * Sectioning root
 * ---
 * @method static self body(string|NodeInterface ...$children)
 *
 * Content sectioning
 * ---
 * @method static self address(string|NodeInterface ...$children)
 * @method static self article(string|NodeInterface ...$children)
 * @method static self aside(string|NodeInterface ...$children)
 * @method static self footer(string|NodeInterface ...$children)
 * @method static self header(string|NodeInterface ...$children)
 * @method static self h1(string|NodeInterface ...$children)
 * @method static self h2(string|NodeInterface ...$children)
 * @method static self h3(string|NodeInterface ...$children)
 * @method static self h4(string|NodeInterface ...$children)
 * @method static self h5(string|NodeInterface ...$children)
 * @method static self h6(string|NodeInterface ...$children)
 * @method static self main(string|NodeInterface ...$children)
 * @method static self nav(string|NodeInterface ...$children)
 * @method static self section(string|NodeInterface ...$children)
 *
 * Text content
 * ---
 * @method static self blockquote(string|NodeInterface ...$children)
 * @method static self dd(string|NodeInterface ...$children)
 * @method static self div(string|NodeInterface ...$children)
 * @method static self dl(string|NodeInterface ...$children)
 * @method static self dt(string|NodeInterface ...$children)
 * @method static self figcaption(string|NodeInterface ...$children)
 * @method static self figure(string|NodeInterface ...$children)
 * @method static self hr(string|NodeInterface ...$children)
 * @method static self li(string|NodeInterface ...$children)
 * @method static self menu(string|NodeInterface ...$children)
 * @method static self ol(string|NodeInterface ...$children)
 * @method static self p(string|NodeInterface ...$children)
 * @method static self pre(string|NodeInterface ...$children)
 * @method static self ul(string|NodeInterface ...$children)
 *
 * Inline text semantics
 * ---
 * @method static self a(string|NodeInterface ...$children)
 * @method static self abbr(string|NodeInterface ...$children)
 * @method static self b(string|NodeInterface ...$children)
 * @method static self bdi(string|NodeInterface ...$children)
 * @method static self bdo(string|NodeInterface ...$children)
 * @method static self br(string|NodeInterface ...$children)
 * @method static self cite(string|NodeInterface ...$children)
 * @method static self code(string|NodeInterface ...$children)
 * @method static self data(string|NodeInterface ...$children)
 * @method static self dfn(string|NodeInterface ...$children)
 * @method static self em(string|NodeInterface ...$children)
 * @method static self i(string|NodeInterface ...$children)
 * @method static self kbd(string|NodeInterface ...$children)
 * @method static self mark(string|NodeInterface ...$children)
 * @method static self q(string|NodeInterface ...$children)
 * @method static self rp(string|NodeInterface ...$children)
 * @method static self rt(string|NodeInterface ...$children)
 * @method static self ruby(string|NodeInterface ...$children)
 * @method static self s(string|NodeInterface ...$children)
 * @method static self samp(string|NodeInterface ...$children)
 * @method static self small(string|NodeInterface ...$children)
 * @method static self span(string|NodeInterface ...$children)
 * @method static self strong(string|NodeInterface ...$children)
 * @method static self sub(string|NodeInterface ...$children)
 * @method static self sup(string|NodeInterface ...$children)
 * @method static self time(string|NodeInterface ...$children)
 * @method static self u(string|NodeInterface ...$children)
 * @method static self var(string|NodeInterface ...$children)
 * @method static self wbr(string|NodeInterface ...$children)
 *
 * Image and multimedia
 * ---
 * @method static self area(string|NodeInterface ...$children)
 * @method static self audio(string|NodeInterface ...$children)
 * @method static self img(string|NodeInterface ...$children)
 * @method static self map(string|NodeInterface ...$children)
 * @method static self track(string|NodeInterface ...$children)
 * @method static self video(string|NodeInterface ...$children)
 *
 * Embedded content
 * ---
 * @method static self embed(string|NodeInterface ...$children)
 * @method static self iframe(string|NodeInterface ...$children)
 * @method static self object(string|NodeInterface ...$children)
 * @method static self picture(string|NodeInterface ...$children)
 * @method static self portal(string|NodeInterface ...$children)
 * @method static self source(string|NodeInterface ...$children)
 *
 * SVG and MathML
 * ---
 * @method static self svg(string|NodeInterface ...$children)
 * @method static self math(string|NodeInterface ...$children)
 *
 * Scripting
 * ---
 * @method static self canvas(string|NodeInterface ...$children)
 * @method static self noscript(string|NodeInterface ...$children)
 * @method static self script(string|NodeInterface ...$children)
 *
 * Demarcating edits
 * ---
 * @method static self del(string|NodeInterface ...$children)
 * @method static self ins(string|NodeInterface ...$children)
 *
 * Table content
 * ---
 * @method static self caption(string|NodeInterface ...$children)
 * @method static self col(string|NodeInterface ...$children)
 * @method static self colgroup(string|NodeInterface ...$children)
 * @method static self table(string|NodeInterface ...$children)
 * @method static self tbody(string|NodeInterface ...$children)
 * @method static self td(string|NodeInterface ...$children)
 * @method static self tfoot(string|NodeInterface ...$children)
 * @method static self th(string|NodeInterface ...$children)
 * @method static self thead(string|NodeInterface ...$children)
 * @method static self tr(string|NodeInterface ...$children)
 *
 * Forms
 * ---
 * @method static self button(string|NodeInterface ...$children)
 * @method static self datalist(string|NodeInterface ...$children)
 * @method static self fieldset(string|NodeInterface ...$children)
 * @method static self form(string|NodeInterface ...$children)
 * @method static self input(string|NodeInterface ...$children)
 * @method static self label(string|NodeInterface ...$children)
 * @method static self legend(string|NodeInterface ...$children)
 * @method static self meter(string|NodeInterface ...$children)
 * @method static self optgroup(string|NodeInterface ...$children)
 * @method static self option(string|NodeInterface ...$children)
 * @method static self output(string|NodeInterface ...$children)
 * @method static self progress(string|NodeInterface ...$children)
 * @method static self select(string|NodeInterface ...$children)
 * @method static self textarea(string|NodeInterface ...$children)
 *
 * Interactive elements
 * ---
 * @method static self details(string|NodeInterface ...$children)
 * @method static self dialog(string|NodeInterface ...$children)
 * @method static self summary(string|NodeInterface ...$children)
 *
 * Web Components
 * ---
 * @method static self slot(string|NodeInterface ...$children)
 * @method static self template(string|NodeInterface ...$children)
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
    protected bool $void;

    /** @var array<string, HtmlAttribute> */
    protected array $attributes = [];

    /** @var list<NodeInterface> */
    protected array $children = [];

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
