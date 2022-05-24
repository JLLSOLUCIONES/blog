<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

use Livewire\WithPagination;

class UsersIndex extends Component
{
    
    Use WithPagination;

    public $search;

    protected $paginationTheme = "bootstrap";
    /* Al ejecutarse el metodo search se activara este metodo y eliminara la pagina del navegador, buscando en toda la lista */
    public function updatingSearch(){
            $this->resetPage();
    }
    
    public function render()
    {
        
        $users = User::where('name', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('email', 'LIKE', '%' . $this->search . '%')
                        ->paginate();
        
        return view('livewire.admin.users-index', compact('users'));
    }
}
