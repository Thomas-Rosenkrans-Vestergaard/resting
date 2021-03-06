<?php

namespace Seier\Resting\Tests\Fields;

use Seier\Resting\Tests\TestCase;
use Seier\Resting\Fields\ArrayField;
use Seier\Resting\Exceptions\NotArrayException;

class ArrayFieldTest extends TestCase
{
    public function testValidation()
    {
        $field = new ArrayField;
        $this->assertEquals($field->validation()[0], 'array');
    }

    public function testInvalidValueValidation()
    {
        $field = new ArrayField;
        $this->expectException(NotArrayException::class);
        $field->set(1);
    }

    public function testValueCanBeSet()
    {
        $field = new ArrayField;
        $field->set($values = ['john', 'doe']);
        $this->assertEquals($values, $field->get());
    }

    public function testEmptyReturnsNull()
    {
        $field = new ArrayField;
        $this->assertNull($field->get());
    }

    public function testNonNullableReturnsEmptyArray()
    {
        $field = (new ArrayField)->nullable(false);
        $this->assertEquals($field->get(), []);
    }
}
