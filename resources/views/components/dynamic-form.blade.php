@props([
    /**
     * @var FieldDefinition[] $fields
     * @var string $action
     */
    "fields",
    "action",
])

<form action="{{ $action }}" method="POST" class="flex flex-col gap-3">
    @csrf

    @foreach ($fields as $field)
        <x-form-input :$field />
    @endforeach

    <button
        class="inline-flex h-9 cursor-pointer items-center justify-center gap-2 whitespace-nowrap rounded-md bg-white px-4 py-2 text-sm font-medium text-black shadow transition-colors hover:bg-white/90 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-blue-400 disabled:pointer-events-none disabled:opacity-50"
        type="submit">Wyślij</button>

    @if (session("success"))
        <div class="text-green-500">
            {{ session("success") }}
        </div>
        <div class="text-sm text-gray-500">
            @foreach (session("data") as $key => $value)
                <div><strong>{{ $key }}:</strong> {{ $value }}</div>
            @endforeach
        </div>
    @endif
</form>
