<?php

namespace App\Livewire;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MassageAdmin extends Component
{

    public $messageText;
    public function render()
    {
        
        $messages = Message::with('Admin')->get()->sortBy('id');
    //    dd( $messages);
        return view('livewire.massage-admin',compact('messages'));
    }
    public function sendMessage()
    {
        $r=auth()->guard('admin')->user()->id;
        // dd($r);
       
        // $r= Auth::Admin()->id;
// dd($r)



        Message::create([
            'admin_id' => $r,
            'user_id'=>auth()->user()->id??null,
            'message_text' => $this->messageText,
        ]);

        $this->reset('messageText');
    }
}
