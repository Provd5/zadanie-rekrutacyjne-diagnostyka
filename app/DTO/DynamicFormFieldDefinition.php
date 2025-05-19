<?php

namespace App\DTO;

class DynamicFormFieldDefinition
{
    public string $label;
    public string $type;
    public string $name;
    public bool $required;
    public string $class;

    /**
     * DynamicFormFieldDefinition constructor.
     *
     * @param string $label    The label for the field (required).
     * @param string $name     The name attribute (required).
     * @param string $type     The input type (optional, default "text").
     * @param bool   $required Indicates whether the field is required (optional, default false).
     * @param string $class    Custom classes for the field (optional, default empty string).
     */
    public function __construct(
        string $label,
        string $name,
        string $type = "text",
        bool $required = false,
        string $class = ''
    ) {
        $this->label = $label;
        $this->name = $name;
        $this->type = $type;
        $this->required = $required;
        $this->class = $class;
    }

    /**
     * Create a new DynamicFormFieldDefinition instance from an associative array.
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['label'],
            $data['name'],
            $data['type'] ?? "text",
            $data['required'] ?? false,
            $data['class'] ?? ''
        );
    }
}
