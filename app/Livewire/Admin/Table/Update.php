<?php

namespace App\Livewire\Admin\Table;

use App\Models\Table;
use Livewire\Component;

class Update extends Component
{
    public $table, $name,  $guest_number,$status,$location;
    protected $listeners=['servicUpdate'];
    public function servicUpdate($id){
      
        $this->table = Table::find($id);
        $this->name = $this->table->name;
        $this->location = $this->table->location;
        $this->guest_number = $this->table->guest_number;

        $this->status = $this->table->status;



        
        $this->resetValidation();
        // show edit modal
      
        $this->dispatch('editModalToggle');

    }


    public function rules()
    {
 return [
            'name' => 'required',
            'location' => 'required',
            'guest_number' => 'required',
            'location' => 'required',
            'status' => 'required',




        ];
    }

    public function submit()
    {
        $data = $this->validate();
        // save data in db
      
        $this->table->update([
            'name'=>$data['name'],
            'location'=>$data['location'],
            'status'=>$data['status'],
            'guest_number'=>$data['guest_number'],
        ]);
        // hide modal
        $this->dispatch('editModalToggle');
        // refresh skills data component
        $this->dispatch('refreshData')->to(Data::class);
    }


    public function render()
    {
        return view('livewire.admin.table.update');
    }
}
