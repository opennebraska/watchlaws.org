<table {{ $attributes->merge(['class' => 'w-full']) }}>
    <thead>
        <tr class="bg-gray-300 border-b-2 border-gray-400">
            {{ $header }}
        </tr>
    </thead>
    <tbody>
        {{ $body }}
    </tbody>
</table>
