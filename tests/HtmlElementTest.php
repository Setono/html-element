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
        )->withAttribute('class', 'btn', 'btn-primary');

        self::assertSame('<div class="btn btn-primary"><p>Lorem ipsum...</p><p>... dolor sit amet...</p></div>', $div->render());
    }
}
