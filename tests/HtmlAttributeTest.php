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
    public function it_renders_with_no_value(): void
    {
        $attribute = new HtmlAttribute('required');
        self::assertSame('required', $attribute->render());
    }

    /**
     * @test
     */
    public function it_allows_stringable_object_as_value_input(): void
    {
        $obj = new class() implements \Stringable {
            public function __toString(): string
            {
                return 'btn';
            }
        };
        $attribute = new HtmlAttribute('class', $obj);
        self::assertSame('class="btn"', $attribute->render());
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

    /**
     * @test
     */
    public function it_is_immutable(): void
    {
        $original = new HtmlAttribute('class', 'btn');
        $new = $original->withValue('btn-primary');
        self::assertNotSame($original, $new);
    }
}
