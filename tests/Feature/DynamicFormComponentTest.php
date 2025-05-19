<?php

namespace Tests\Feature;

use Tests\TestCase;

class DynamicFormComponentTest extends TestCase
{
    public function test_dynamic_form_renders_fields_correctly(): void
    {
        $fields = [
            ['type' => 'text', 'name' => 'name', 'required' => true, 'label' => 'Imię', 'class' => 'my-name'],
            ['type' => 'email', 'name' => 'email', 'required' => true, 'label' => 'Email', 'class' => 'my-email'],
            ['type' => 'textarea', 'name' => 'description', 'required' => false, 'label' => 'Opis', 'class' => 'my-description'],
        ];

        $action = route("dynamic-form.store");

        $rendered = $this->blade('<x-dynamic-form :$action :$fields />', [
            'fields' => $fields,
            'action' => $action,
        ]);

        // form
        $rendered->assertSee('<form', false);
        $rendered->assertSee('action="' . $action . '"', false);

        // csrf token
        $rendered->assertSee('name="_token"', false);

        // at least once
        $rendered->assertSee('required', false);
        $rendered->assertSee('<input', false);
        $rendered->assertSee('<textarea', false);

        // name field
        $rendered->assertSee('my-name', false);
        $rendered->assertSee('name="name"', false);
        $rendered->assertSee('type="text"', false);

        // email field
        $rendered->assertSee('my-email', false);
        $rendered->assertSee('name="email"', false);
        $rendered->assertSee('type="email"', false);

        // description field
        $rendered->assertSee('my-description', false);
        $rendered->assertSee('name="description"', false);
    }
}
