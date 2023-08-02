<?php

namespace App\Http\Livewire\Modals;

use App\Http\Livewire\Modal;
use App\Models\Setting;
use App\Notifications\BuyHouseNotification;
use Illuminate\Support\Facades\Notification;

class BuyHouse extends Modal
{
    public $name;
    public $phone;

    public function send()
    {
        $validated = $this->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);

        Notification::route('mail', Setting::where('code', 'email')->first()?->value)
            ->notify(new BuyHouseNotification($validated));

    }

    public function render()
    {
        return view('livewire.modals.buy-house');
    }
}
