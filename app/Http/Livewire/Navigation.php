<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
Use App\Models\Category;

class Navigation extends Component
{
    public function render()
    {
        $categories = Category::all();
        

        return view('livewire.navigation', compact('categories'));
    }
}
