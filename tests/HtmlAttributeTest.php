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
    public function it_returns_name_and_value(): void
    {
        $attribute = (new HtmlAttribute('class', 'btn'));
        self::assertTrue($attribute->hasValue());
        self::assertSame('class', $attribute->name());
        self::assertSame('btn', $attribute->value());
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

    /**
     * @test
     *
     * @dataProvider getValues
     */
    public function it_removes_values(string $value, string $remove, string $expected): void
    {
        $attribute = (new HtmlAttribute('class', $value))->removeValue($remove);
        self::assertSame($expected, $attribute->value());
    }

    /**
     * @return \Generator<array-key, array<array-key, string>>
     */
    public function getValues(): \Generator
    {
        yield ['class1', 'class1', ''];
        yield ['class1 class2', 'class1', 'class2'];
        yield ['class1 class2', 'class2', 'class1'];
        yield ['class1 class2 class3', 'class2', 'class1 class3'];
        yield ['class1 class2 class3', 'class', 'class1 class2 class3'];
    }
}
