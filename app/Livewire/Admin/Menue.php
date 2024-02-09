<?php

namespace App\Livewire\Admin;

use App\Models\Menue as ModelsMenue;
use Livewire\Component;
use Livewire\WithPagination;
class Menue extends Component
{
    // public function render()
    // {
    //     return view('livewire.admin.menue');
    // }
   
    
    public $id,  $name, $image, $descreption, $price;

    /**
     * delete action listener
     */
    // protected $listeners = [
    //     'deletePostListner'=>'deletePost'
    // ];

    // /**
    //  * List of add/edit form rules 
    //  */
    // protected $rules = [
    //     'name' => 'required',
    //     'description' => 'required'
    // ];

    // /**
    //  * Reseting all inputted fields
    //  * @return void
    //  */
    // public function resetFields(){
    //     $this->name = '';
    //     $this->descreption = '';
    // }
    
    // /**
    //  * render the post data
    //  * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    //  */
    // public function render()
    // {
    //     $this->menue = ModelsMenue::get();
    //     return view('livewire.admin.menue');
    // }

    // use WithPagination;
    protected $listeners = ['refreshData' => '$refresh'];


    // public $search;
    // public function updatingSearch()
    // {
    //     $this->resetPage();
    // }
    public function render()
    {
        $menue=ModelsMenue::get();

    //      return <<<'blade'

    //     <div>ssssss</div>

    // blade;
    
    return   view('livewire.admin.menue',compact('menue'));
    }
    /**
     * Open Add Post form
     * @return void
     */
    
}
