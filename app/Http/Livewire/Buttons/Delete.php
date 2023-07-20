<?php

namespace App\Http\Livewire\Buttons;

use Livewire\Component;
use Illuminate\Support\Facades\File;

class Delete extends Component
{
    // public string $post;
    public $post;
    public $confirmingPostDeletion = false;

    public function confirmPostDeletion()
    {
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('confirming-delete-post');
        $this->confirmingPostDeletion=true;
    }
    public function deletePost(){
        File::delete(storage_path('app/public/images/' .$this->post->cover_image));
        $this->post->delete();
        session()->flash('error','Post Successfully Deleted');
        return redirect()->route('posts.index')->with('error','Post Successfully Deleted');
    }
    public function render()
    {
        return view('livewire.buttons.delete');
    }
}
