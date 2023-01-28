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
        $div = HtmlElement::div('test');

        self::assertSame('<div>test</div>', $div->render());
        self::assertSame('<div>', $div->renderStart());
        self::assertSame('test', $div->renderChildren());
        self::assertSame('</div>', $div->renderEnd());
    }

    /**
     * @test
     */
    public function it_renders(): void
    {
        $div = HtmlElement::div(
            HtmlElement::p('Lorem ipsum...'),
            HtmlElement::p('... dolor sit amet...'),
        )->withAttribute('class', 'btn btn-primary')
            ->withAttribute('id', 'submit')
            ->withClass('btn-lg')
        ;

        $expected = '<div class="btn btn-primary btn-lg" id="submit"><p>Lorem ipsum...</p><p>... dolor sit amet...</p></div>';

        self::assertSame($expected, $div->render());
        self::assertSame($expected, (string) $div);
    }

    /**
     * @test
     */
    public function it_is_immutable(): void
    {
        $original = HtmlElement::div();

        $new = $original->withAttribute('class', 'container');
        self::assertNotSame($original, $new);

        $new = $original->withClass('container');
        self::assertNotSame($original, $new);
    }

    /**
     * @test
     */
    public function it_throws_exception_if_you_try_to_instantiate_with_children_on_a_void_element(): void
    {
        $this->expectException(\RuntimeException::class);

        /** @psalm-suppress TooManyArguments */
        HtmlElement::img(HtmlElement::div());
    }
}
