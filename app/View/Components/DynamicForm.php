<?php

namespace App\View\Components;

use App\DTO\FieldDefinition;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Closure;

class DynamicForm extends Component
{
    public string $action;

    /**
     * @var FieldDefinition[]
     */
    public array $fields;

    /**
     * @param string $action
     * @param FieldDefinition[]|array[] $fields
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

    public function render(): View|Closure|string
    {
        return view('components.dynamic-form');
    }
}
