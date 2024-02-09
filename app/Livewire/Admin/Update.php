<?php

namespace App\Livewire\Admin;

use App\Models\Menue;
use Livewire\Component;
use App\Livewire\Admin\Menue as AdminMenue;
class Update extends Component
{
    
    public $menue, $name, $descreption ,$price;
    protected $listeners=['servicUpdate'];
    public function servicUpdate($id){
      
        $this->menue = Menue::find($id);
        $this->name = $this->menue->name;
        $this->descreption = $this->menue->descreption;

        $this->price = $this->menue->price;



        
        $this->resetValidation();
        // show edit modal
      
        $this->dispatch('editModalToggle');

    }


    public function rules()
    {
 return [
            'name' => 'required',
            'descreption' => 'required',
            'price' => 'required',


        ];
    }

    public function submit()
    {
        $data = $this->validate();
        // save data in db
      
        $this->menue->update([
            'name'=>$data['name'],
            'descreption'=>$data['descreption'],
            'price'=>$data['price'],
        ]);
        // hide modal
        $this->dispatch('editModalToggle');
        // refresh skills data component
        $this->dispatch('refreshData')->to(AdminMenue::class);
    }




    public function render()
    {
        return view('livewire.admin.update');
    }
}
