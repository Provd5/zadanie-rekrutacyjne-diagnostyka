@props([
    /**
     * @var FieldDefinition $field
     */
    "field",
])

@php
    $hasError = isset($errors) && $errors->has($field->name);
    $id = $field->name . "-id";
    $commonAttributes = [
        "id" => $id,
        "name" => $field->name,
        "placeholder" => $field->label,
        "required" => $field->required ? true : false,
    ];

    $errorClass = $hasError ? "border-red-500" : "border-stone-500";
    $commonClass =
        "flex w-full rounded-md border bg-transparent px-3 text-base shadow-sm placeholder:text-stone-600 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-blue-400 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm";
@endphp

<div class="flex flex-col gap-0.5">
    <label for="{{ $id }}">{{ $field->label }}</label>

    @if ($field->type === "textarea")
        <textarea
            {{ $attributes->merge($commonAttributes)->class([$field->class, $commonClass, $errorClass, "min-h-[60px] py-2"]) }}>{{ old($field->name) }}</textarea>
    @else
        <input value="{{ old($field->name) }}" type="{{ $field->type }}"
            {{ $attributes->merge($commonAttributes)->class([$field->class, $commonClass, $errorClass, "h-9 py-1"]) }} />
    @endif

    @if ($hasError)
        <div id="{{ $field->name . "-error" }}" class="text-red-500">{{ $errors->first($field->name) }}</div>
    @endif
</div>
