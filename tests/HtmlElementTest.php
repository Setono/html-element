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
    public function it_renders_empty_strings_when_applicable(): void
    {
        $br = HtmlElement::br();

        self::assertSame('', $br->renderChildren());
        self::assertSame('', $br->renderEnd());
    }

    /**
     * @test
     */
    public function it_removes_class(): void
    {
        $div = HtmlElement::div()->withAttribute('class', 'btn btn-primary')->withoutClass('btn');

        $expected = '<div class="btn-primary"></div>';

        self::assertSame($expected, $div->render());
    }

    /**
     * @test
     */
    public function it_answers_has_attribute(): void
    {
        $div = HtmlElement::div()->withAttribute('class', 'btn btn-primary');

        self::assertTrue($div->hasAttribute('class'));
        self::assertFalse($div->hasAttribute('id'));
    }

    /**
     * @test
     */
    public function it_gets_an_attribute(): void
    {
        $div = HtmlElement::div()->withAttribute('class', 'btn btn-primary');

        $attribute = $div->getAttribute('class');
        self::assertSame('btn btn-primary', $attribute->value());
    }

    /**
     * @test
     */
    public function it_does_not_do_anything_if_the_element_does_not_have_the_given_attribute(): void
    {
        $original = HtmlElement::div();

        $new = $original->withoutClass('class');
        self::assertSame($original, $new);
    }

    /**
     * @test
     */
    public function it_does_not_do_anything_if_the_element_has_the_attribute_but_the_attribute_does_not_have_a_value(): void
    {
        $original = HtmlElement::div()->withAttribute('class');

        $new = $original->withoutClass('btn');
        self::assertSame($original, $new);
    }

    /**
     * @test
     */
    public function it_throws_an_exception_if_you_try_to_get_attribute_that_does_not_exist(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $div = HtmlElement::div();

        $div->getAttribute('class');
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

        $new = $original->withClass('container');
        $new2 = $new->withoutClass('container');
        self::assertNotSame($new, $new2);
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
