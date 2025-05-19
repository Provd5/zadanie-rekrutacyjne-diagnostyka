<?php

namespace App\View\Components;

use App\DTO\DynamicFormFieldDefinition;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Closure;

class DynamicForm extends Component
{
    public string $action;
    public array $fields;

    /**
     * @param string $action The URL where the form should be submitted.
     * @param array<DynamicFormFieldDefinition>|array $fields Array of field definitions or raw field arrays.
     */
    public function __construct(string $action, array $fields)
    {
        $this->action = $action;

        $this->fields = array_map(function ($field) {
            return $field instanceof DynamicFormFieldDefinition
                ? $field
                : DynamicFormFieldDefinition::fromArray($field);
        }, $fields);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.dynamic-form');
    }
}
