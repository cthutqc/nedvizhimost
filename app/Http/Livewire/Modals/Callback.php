<?php

namespace App\Http\Livewire\Modals;

use App\Http\Livewire\Modal;

class Callback extends Modal
{
    public $name;
    public $phone;

    public function send()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);
    }

    public function render()
    {
        return view('livewire.modals.callback');
    }
}
