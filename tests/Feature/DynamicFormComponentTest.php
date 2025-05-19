<?php

namespace Tests\Feature;

use App\DTO\DynamicFormFieldDefinition;
use Tests\TestCase;

class DynamicFormComponentTest extends TestCase
{
    public function test_form_renders_with_correct_action_and_csrf(): void
    {
        $action = route("user-data-form.store");

        $rendered = $this->blade('<x-dynamic-form :$action :$fields />', [
            'fields' => [],
            'action' => $action,
        ]);

        $rendered->assertSee('<form', false);
        $rendered->assertSee('action="' . $action . '"', false);
        $rendered->assertSee('method="POST"', false);
        $rendered->assertSee('name="_token"', false);
    }

    public function test_input_renders_correctly(): void
    {
        $fields = [
            new DynamicFormFieldDefinition('Email', 'email', 'email', true, 'my-email')
        ];
        $rendered = $this->blade('<x-dynamic-form :$action :$fields />', [
            'fields' => $fields,
            'action' => "",
        ]);

        $rendered->assertSee('<label for="email-id"', false);
        $rendered->assertSee('<input', false);
        $rendered->assertSee('name="email"', false);
        $rendered->assertSee('my-email', false);
        $rendered->assertSee('required', false);
    }

    public function test_textarea_renders_correctly(): void
    {
        $fields = [
            new DynamicFormFieldDefinition('Opis', 'description', 'textarea', false, 'my-description')
        ];
        $rendered = $this->blade('<x-dynamic-form :$action :$fields />', [
            'fields' => $fields,
            'action' => "",
        ]);

        $rendered->assertSee('<label for="description-id"', false);
        $rendered->assertSee('<textarea', false);
        $rendered->assertSee('name="description"', false);
        $rendered->assertSee('my-description', false);
        $rendered->assertDontSee('required', false);
    }
}
