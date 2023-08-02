<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use App\Notifications\CallbackNotification;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class CallbackForm extends Component
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
            ->notify(new CallbackNotification($validated));

        $this->dispatchBrowserEvent('success-show');
    }

    public function render()
    {
        return view('livewire.callback-form');
    }
}
