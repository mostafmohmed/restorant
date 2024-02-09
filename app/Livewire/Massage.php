<?php

namespace App\Livewire;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Massage extends Component
{
    public $messageText;
    public function render()
    {
        $messages = Message::with('user')->get()->sortBy('id');

        return view('livewire.massage', compact('messages')
    
       
    );
    }


    public function sendMessage()
    {

        
        Message::create([
            'user_id' => auth()->user()->id,
            'message_text' => $this->messageText,
        ]);

        $this->reset('messageText');
    }


}
