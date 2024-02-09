<?php

namespace App\Livewire\Admin\Table;

use App\Models\Table;
use Livewire\Component;

class Create extends Component
{
    public  $name,  $guest_number,$status,$location;
    public function render()
    {
        return view('livewire.admin.table.create');
    }
    public function submit()
    {
      
        
        $validated = $this->validate([ 
            'name' => 'required',
            'guest_number' => 'required',
            'location' => 'required',
            'status'=> 'required',
        ]);
     
        // save data in db
        Table::create([
            'name' => $this->name,
            'guest_number' => $this->guest_number,
            'status' =>$this->status,
             'location'=>$this->location,

        ]);
        $this->reset(['name', 'guest_number', 'status','location']);
        // hide modal
        $this->dispatch('createModalToggle');
        // refresh skills data component
        $this->dispatch('refreshData')->to(Data::class);
    }

}
