@php
    $action = route("dynamic-form.store");
    $fields = [
        ["type" => "text", "name" => "name", "required" => true, "label" => "Imię", "class" => "my-name"],
        ["type" => "email", "name" => "email", "required" => true, "label" => "Email", "class" => "my-email"],
        [
            "type" => "textarea",
            "name" => "description",
            "required" => false,
            "label" => "Opis",
            "class" => "my-description",
        ],
    ];
@endphp

<x-app-layout title="Formularz">
    <div class="flex grow items-center justify-center">
        <x-dynamic-form :$action :$fields />
    </div>
</x-app-layout>
