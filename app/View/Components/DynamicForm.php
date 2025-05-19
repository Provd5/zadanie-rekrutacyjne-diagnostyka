<?php

namespace App\View\Components;

use App\DTO\FieldDefinition;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Closure;

class DynamicForm extends Component
{
    /**
     * The form action URL.
     *
     * @var string
     */
    public string $action;

    /**
     * The array of form fields.
     *
     * @var FieldDefinition[]
     */
    public array $fields;

    /**
     * Create a new component instance.
     *
     * @param string $action The URL where the form should be submitted.
     * @param FieldDefinition[]|array[] $fields Array of field definitions or raw field arrays.
     */
    public function __construct(string $action, array $fields)
    {
        $this->action = $action;

        $this->fields = array_map(function ($field) {
            return $field instanceof FieldDefinition
                ? $field
                : FieldDefinition::fromArray($field);
        }, $fields);
    }

    /**
     * View that represents the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.dynamic-form');
    }
}
