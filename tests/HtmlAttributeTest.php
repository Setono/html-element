<?php

declare(strict_types=1);

namespace Setono\HtmlElement;

use PHPUnit\Framework\TestCase;

/**
 * @covers \Setono\HtmlElement\HtmlAttribute
 */
final class HtmlAttributeTest extends TestCase
{
    /**
     * @test
     */
    public function it_renders(): void
    {
        $attribute = new HtmlAttribute('class', 'btn btn-primary');
        self::assertSame('class="btn btn-primary"', $attribute->render());
    }

    /**
     * @test
     */
    public function it_maintains_unique_values(): void
    {
        $attribute = (new HtmlAttribute('class', 'btn', 'btn'))->withValue('btn');
        self::assertSame('class="btn"', $attribute->render());
    }
}
