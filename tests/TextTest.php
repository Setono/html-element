<?php

declare(strict_types=1);

namespace Setono\HtmlElement;

use PHPUnit\Framework\TestCase;

/**
 * @covers \Setono\HtmlElement\Text
 */
final class TextTest extends TestCase
{
    /**
     * @test
     */
    public function it_renders(): void
    {
        $text = new Text('test');
        self::assertSame('test', $text->render());
        self::assertSame('test', (string) $text);
    }
}
