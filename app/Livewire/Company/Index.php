<?php

namespace App\Livewire\Company;


use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithPagination;

    public $page = 10;
    public $search = '';

    public $sortDir = 'ASC';
    public $sortCol = 'name';

    public function sorting($column)
    {
        if($this->sortCol === $column)
        {
            $this->sortDir = ($this->sortDir == 'ASC')? 'DESC' : 'ASC';
            return;
        }
        $this->sortCol = $column;
        $this->sortDir = 'ASC';
    }

    public function render()
    {
        return view('livewire.company.index',[
            'companies' => Company::search($this->search)
            ->orderBy($this->sortCol, $this->sortDir)        
            ->paginate($this->page) 
        ]);
    }

    public function delete($id)
    {    
        $company = Company::where('id',$id)->first();

        if(Storage::exists(str_replace('storage/', 'public/', $company->logo)))
        {
            Storage::delete(str_replace('storage/', 'public/', $company->logo));
        }

        $company->delete();
        
        session()->flash('success', 'Company deleted successfully!');
    }

    public function logout()
    {
        Auth::guard('web')->logout();

        Session::invalidate();
        Session::regenerateToken();
        
        return redirect()->route('login');
    }
    

    
}
