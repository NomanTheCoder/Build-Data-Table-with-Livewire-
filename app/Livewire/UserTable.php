<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{
    use WithPagination;
    public $perPage;
    #[Url(history:true)]
    public $search;
    public $admin;

    public $sortby='created_at';
    public $sortDir ='DESC';

    public function delete(User $user){
        $user->delete();
    }

    public function SortBy($sortbyFields){
        if($this->sortby === $sortbyFields){
            $this->sortDir =($this->sortDir =='ASC') ? 'DESC':'ASC';
            return;
        }
        $this->sortby=$sortbyFields;
        $this->sortDir='DESC';
        
    }
   
    public function render()
    {
        return view('livewire.user-table',[
            'users'=>User::search($this->search)
            ->when($this->admin != '',function($query){
                $query->where('is_admin',$this->admin);

            })
            ->orderBy($this->sortby,$this->sortDir)
            ->paginate($this->perPage)
        ]);
    }
}
