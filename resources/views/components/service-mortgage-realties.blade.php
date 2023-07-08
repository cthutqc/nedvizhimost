@props([
    'mortgage_realties' => $mortgageRealties
])
@if($mortgage_realties)
    <x-row>
        <x-title>Что можно купить</x-title>
        @each('mortgages.mortgage_realty_item', $mortgage_realties, 'mortgage_realty')
    </x-row>
@endif
