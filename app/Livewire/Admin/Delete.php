<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Livewire\Admin\Menue as AdminMenue;
use App\Models\Menue;

class Delete extends Component
{
    public $menue;
    protected $listeners=['serviceDelete'];
    public function serviceDelete($id){
     
        $this->menue = Menue::find($id);
         // show delet modal
        $this->dispatch('deleteModalToggle');
      

    }
public function submit(){
    $this->menue->delete();
//hi model
$this->reset('menue');
    $this->dispatch('deleteModalToggle');

//refreash padge
$this->dispatch('refreshData')->to(AdminMenue::class);
}
   
    public function render()
    {
        return view('livewire.admin.delete');
    }
}
