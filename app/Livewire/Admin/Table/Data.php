<?php

namespace App\Livewire\Admin\Table;

use App\Models\Table;
use Livewire\Component;

class Data extends Component
{
public  $name,  $guest_number,$status,$location;
protected $listeners = ['refreshData' => '$refresh'];
   
    public function render()
    {
        $table=Table::get();
        return view('livewire.admin.table.data',compact('table'));
    }
}
