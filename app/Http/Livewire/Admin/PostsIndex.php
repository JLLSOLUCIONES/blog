<?php

namespace App\Http\Livewire\Admin;


use Livewire\Component;
use App\Models\Post;

use Livewire\WithPagination;

class PostsIndex extends Component
{

    use WithPagination;
    
    //Esto le indica que los estilos para la paginacion los debe mostrar con los estilos de bootstrap
    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){

        $this->resetPage();
    }

    public function render()
    {

        // recuperamos el listado de posts del usuario actualmente identificado
        $posts = Post::where('user_id', auth()->user()->id)
                    ->where('name', 'LIKE', '%' . $this->search. '%')
                    ->latest('id')
                    ->paginate();

        return view('livewire.admin.posts-index', compact('posts'));
    }
}
