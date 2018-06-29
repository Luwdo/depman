<?php

namespace App\Util;

class FlashMessage
{

    public function error($message){
        $this->addMessage('danger', $message);
    }

    public function success($message){
        $this->addMessage('success', $message);
    }

    private function addMessage($type, $message){
        $message = ['type' => $type, 'message' => $message];
        $messages = session()->get('flash_messages', []);
        $messages[] = $message;
        session()->flash('flash_messages', $messages);
    }


}