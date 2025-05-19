<?php

namespace App\DTO;

class FieldDefinition
{
    public string $label;
    public string $type;
    public string $name;
    public bool $required;
    public string $class;

    /**
     * FieldDefinition constructor.
     *
     * @param string $label    The label for the field.
     * @param string $type     The input type.
     * @param string $name     The name attribute.
     * @param bool   $required Indicates whether the field is required.
     * @param string $class    Custom classes for the field.
     */
    public function __construct(
        string $label,
        string $type,
        string $name,
        bool $required,
        string $class
    ) {
        $this->label = $label;
        $this->type = $type;
        $this->name = $name;
        $this->required = $required;
        $this->class = $class;
    }

    /**
     * Create a new FieldDefinition instance from an associative array.
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['label'] ?? '',
            $data['type'] ?? 'text',
            $data['name'] ?? '',
            $data['required'] ?? false,
            $data['class'] ?? ''
        );
    }
}
