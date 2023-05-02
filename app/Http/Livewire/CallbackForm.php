<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CallbackForm extends Component
{
    public $name;
    public $phone;

    public function send()
    {
        $this->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);

        $this->dispatchBrowserEvent('success-show');
    }

    public function render()
    {
        return view('livewire.callback-form');
    }
}
