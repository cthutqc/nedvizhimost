<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Modal extends Component
{
    public $show = false;
    public $search = false;

    protected $listeners = [
        'show' => 'show',
        'showSearch' => 'showSearch'
    ];

    public function show()
    {
        $this->show = true;
        $this->search = false;
    }

    public function showSearch()
    {
        $this->show = true;
        $this->search = true;
    }
}
