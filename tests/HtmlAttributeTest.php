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
        self::assertSame('class="btn btn-primary"', (string) $attribute);
    }

    /**
     * @test
     */
    public function it_maintains_unique_values(): void
    {
        $attribute = (new HtmlAttribute('class', 'btn', 'btn'))->withValue('btn');
        self::assertSame('class="btn"', $attribute->render());
    }

    /**
     * @test
     */
    public function it_returns_name_and_values(): void
    {
        $attribute = (new HtmlAttribute('class', 'btn', 'btn-primary'));
        self::assertSame('class', $attribute->name());
        self::assertSame(['btn', 'btn-primary'], $attribute->values());
    }
}
