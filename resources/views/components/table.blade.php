<table {{ $attributes->merge(['class' => 'w-full']) }}>
    <thead>
        <tr class="bg-gray-300">
            {{ $header }}
        </tr>
    </thead>
    <tbody>
        {{ $body }}
    </tbody>
</table>
