<?php

declare(strict_types=1);

namespace Setono\HtmlElement;

use PHPUnit\Framework\TestCase;

/**
 * @covers \Setono\HtmlElement\HtmlElement
 */
final class HtmlElementTest extends TestCase
{
    /**
     * @test
     */
    public function it_renders_a_single_element(): void
    {
        $div = HtmlElement::div();

        self::assertSame('<div></div>', $div->render());
    }

    /**
     * @test
     */
    public function it_renders(): void
    {
        $div = HtmlElement::div(
            HtmlElement::p('Lorem ipsum...'),
            HtmlElement::p('... dolor sit amet...'),
        )->withAttribute('class', 'btn', 'btn-primary')
            ->withAttribute(new HtmlAttribute('id', 'submit'))
            ->withClass('btn-lg')
        ;

        $expected = '<div class="btn btn-primary btn-lg" id="submit"><p>Lorem ipsum...</p><p>... dolor sit amet...</p></div>';

        self::assertSame($expected, $div->render());
        self::assertSame($expected, (string) $div);
    }

    /**
     * @test
     */
    public function it_is_extendable(): void
    {
        $image = ImageElement::new()->withAttribute('class', 'image', 'rounded')->withAttribute('src', 'https://example.com/images/foobar.jpg');

        self::assertSame('<img class="image rounded" src="https://example.com/images/foobar.jpg">', $image->render());
    }

    /**
     * @test
     */
    public function it_throws_exception_if_you_try_to_instantiate_with_static_magic_method_from_child(): void
    {
        $this->expectException(\RuntimeException::class);

        ImageElement::div();
    }

    /**
     * @test
     */
    public function it_throws_exception_if_you_try_to_instantiate_with_children_on_a_void_element(): void
    {
        $this->expectException(\RuntimeException::class);

        HtmlElement::img(HtmlElement::div());
    }
}

final class ImageElement extends HtmlElement
{
    public function __construct(string|NodeInterface ...$children)
    {
        parent::__construct('img', ...$children);
    }

    public static function new(string|NodeInterface ...$children): self
    {
        return new self(...$children);
    }
}
