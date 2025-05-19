<?php

namespace Tests\Feature;

use Tests\TestCase;

class DynamicFormTest extends TestCase
{
    public function test_form_submit_with_valid_data()
    {
        $response = $this->post(route("dynamic-form.store"), [
            'name' => 'Jan Kowalski',
            'email' => 'jan@example.com',
            'description' => 'Opis opcjonalny',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Formularz przesłany pomyślnie.');
        $response->assertSessionHas('data');
    }


    public function test_validation_errors_for_invalid_data()
    {
        $response = $this->post(route("dynamic-form.store"), [
            'name' => 'J',
            'email' => 'invalid-email',
        ]);

        $response->assertSessionHasErrors([
            'name',
            'email',
        ]);

        $response->assertRedirect();
        $response = $this->get(route("index"));

        $response->assertSee('name-error', false);
        $response->assertSee('email-error', false);
    }

    public function test_validation_errors_for_missing_data()
    {
        $response = $this->post(route("dynamic-form.store"), [
            'name' => '',
            'email' => '',
        ]);

        $response->assertSessionHasErrors([
            'name',
            'email',
        ]);

        $response->assertRedirect();
        $response = $this->get(route("index"));

        $response->assertSee('name-error', false);
        $response->assertSee('email-error', false);
    }
}
