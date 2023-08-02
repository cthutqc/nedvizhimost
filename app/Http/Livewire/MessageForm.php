<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use App\Notifications\ContactsNotification;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class MessageForm extends Component
{

    public $name;
    public $phone;
    public $message;

    public function send()
    {
        $validated = $this->validate([
            'name' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);

        Notification::route('mail', Setting::where('code', 'email')->first()?->value)
            ->notify(new ContactsNotification($validated));

        $this->dispatchBrowserEvent('success-show');
    }

    public function render()
    {
        return view('livewire.message-form');
    }
}
