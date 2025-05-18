<?php

namespace App\DTO;

class FieldDefinition
{
    public string $label;
    public string $type;
    public string $name;
    public bool $required;
    public string $class;


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
