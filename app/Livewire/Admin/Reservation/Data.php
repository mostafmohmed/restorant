<?php

namespace App\Livewire\Admin\Reservation;

use App\Models\Reservation;
use Livewire\Component;

class Data extends Component
{
    public  $first_name,  $last_name,$email,$tel_number,$res_data,$table_id,$guet_number;
protected $listeners = ['refreshData' => '$refresh'];

  
    public function render()
    {
        $reservations=Reservation::get();

        return view('livewire.admin.reservation.data',compact('reservations'));
    }
}
