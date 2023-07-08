@props([
    'mortgage_conditions' => $mortgageConditions
])
@if($mortgage_conditions)
    <x-row>
        <div class="lg:flex justify-start lg:space-x-4 space-y-4 lg:space-y-0">
            @each('mortgages.mortgage_condition_item', $mortgage_conditions, 'mortgage_condition')
        </div>
    </x-row>
@endif
