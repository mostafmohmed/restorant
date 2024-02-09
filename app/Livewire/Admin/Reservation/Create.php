<?php

namespace App\Livewire\Admin\Reservation;

use App\Models\Reservation;
use App\Models\Table;
use Livewire\Component;

class Create extends Component
{
    public  $first_name,  $last_name,$email,$tel_number,$res_data,$table_id,$guet_number;
    
    public function render()
    {
        $tables=Table::get();
        return view('livewire.admin.reservation.create',compact('tables'));
    }
    public function submit()
    {
      
        // $validated = $this->validate([ 
        //     'name' => 'required',
        //     'guest_number' => 'required',
        //     'location' => 'required',
        //     'status'=> 'required',
        // ]);
     
        // save data in db
        Reservation::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' =>$this->email,
             'tel_number'=>$this->tel_number,
             'res_data'=>$this->res_data,
             'table_id'=>$this->table_id,
             'guet_number'=>$this->guet_number,

        ]);
        $this->reset(['name', 'guest_number', 'status','location']);
        // hide modal
        $this->dispatch('createModalToggle');
        // refresh skills data component
        $this->dispatch('refreshData')->to(Data::class);
    }
}
