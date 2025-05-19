<?php

namespace Tests\Unit;

use App\DTO\DynamicFormFieldDefinition;
use PHPUnit\Framework\TestCase;

class DynamicFormFieldDefinitionTest extends TestCase
{
    public function test_creates_field_from_array(): void
    {
        $input = [
            'type' => 'text',
            'name' => 'name',
            'required' => true,
            'label' => 'Imię',
            'class' => 'my-name',
        ];

        $field = DynamicFormFieldDefinition::fromArray($input);

        $this->assertEquals('text', $field->type);
        $this->assertEquals('name', $field->name);
        $this->assertTrue($field->required);
        $this->assertEquals('Imię', $field->label);
        $this->assertEquals('my-name', $field->class);
    }
}
