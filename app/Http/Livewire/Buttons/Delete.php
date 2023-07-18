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
        File::delete(public_path('img/blog/' .$this->post->cover_image));
        session()->flash('error','Post Successfully Deleted');
        $this->post->delete();
        return redirect()->route('posts.index')->with('error','Post Successfully Deleted');
    }
    public function render()
    {
        return view('livewire.buttons.delete');
    }
}
