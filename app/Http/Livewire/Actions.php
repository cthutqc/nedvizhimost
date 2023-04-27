<?php

namespace App\Http\Livewire;

use App\Models\Action;
use App\Models\ActionVariant;
use App\Models\User;
use App\Notifications\NewActionRequestNotification;
use Livewire\Component;

class Actions extends Component
{
    public $actions;
    public $activeAction;
    public $actionVariants;
    public $activeVariant = [];
    public $isOpen = [];
    public $phone;
    public $address;

    public function mount()
    {
        $this->actions = Action::all();

        $this->setActiveAction(1);

        $this->activeVariant[$this->activeAction] = null;
    }

    public function send()
    {
        $this->validate([
            'phone' => ['required'],
            'address' => ['required'],
            'activeVariant' => ['required']
        ]);

        $this->dispatchBrowserEvent('success-show');

        /*if(app()->isProduction()) {
            User::role('manager')->get()->each(function ($user){
                $user->notify(new NewActionRequestNotification($this->address, $this->phone, $this->activeAction, $this->activeVariant[$this->activeAction]));
            });
        }*/
    }

    public function setActiveAction($id)
    {
        $this->activeAction = $id;

        $this->actionVariants = ActionVariant::whereHas('actions', function ($q){
            $q->where('action_id', $this->activeAction);
        })
            ->when(!isset($this->isOpen[$this->activeAction]), function ($q){
                $q->take(3);
            })
            ->get();
    }

    public function setOpen()
    {
        $this->isOpen[$this->activeAction] = true;

        $this->actionVariants = ActionVariant::whereHas('actions', function ($q){
            $q->where('action_id', $this->activeAction);
        })->get();
    }

    public function close()
    {
        $this->success = false;
    }

    public function setActiveVariant($id)
    {
        $this->activeVariant[$this->activeAction] = $id;
    }

    public function render()
    {
        return view('livewire.actions');
    }
}
