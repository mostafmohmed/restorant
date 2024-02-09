<?php

namespace App\Livewire\Admin;
use Livewire\WithFileUploads;
use App\Livewire\Admin\Menue as AdminMenue;
use App\Models\Menue;
use Livewire\Component;

class Create extends Component
{
    use WithFileUploads;
    public $price;

public $name;
public $descreption;
public $image;
    public function render()
    {
        return view('livewire.admin.create');
    }
    public function submit()
    {
        // dd("jjjj");
      
    $data=    $validated = $this->validate([ 
            'price' => 'required',
            'descreption' => 'required',
            'name' => 'required',
           
        ]);
      
        // $this->image->store('image');




        $image_name=time().'-'.$this->image->getClientOriginalName();

       $res=$this->image->storeAs('images',$image_name,'public');
    //    $img_path=asset('uploads/images/'.$image_name);

//  dd( $image_name);
// return

        // save data in db
        Menue::create([
            'name' => $this->name,
            'descreption' => $this->descreption,
            'price' =>$this->price,
              'image'=> "storage/images". $this->image,
        ]);
        $this->reset(['name', 'descreption', 'price','image']);
        // hide modal
       $this->dispatch('createModalToggle');
        // refresh skills data component
        $this->dispatch('refreshData')->to(AdminMenue::class);
    }

}
