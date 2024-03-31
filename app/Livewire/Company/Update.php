<?php

namespace App\Livewire\Company;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class Update extends Component
{
    use WithFileUploads;

    public $companies;

    public $id;
    public $name;
    public $email;
    public $website;
    public $logo;
    public $prev_logo;

    public function mount($companies)
    {
        $this->id = $companies->id;
        $this->name = $companies->name ;
        $this->email = $companies->email ;
        $this->website = $companies->website ;
        $this->prev_logo = $companies->logo ;
    }

    public function render()
    {
        return view('livewire.company.update');
    }

    public function update(){

        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
            'logo' => 'nullable|image|dimensions:min_width=100,min_height=100',
        ]);


        if ($this->logo) {
            if(Storage::exists(str_replace('storage/', 'public/', $this->prev_logo)))
            {
                Storage::delete(str_replace('storage/', 'public/', $this->prev_logo));
            }

            $filePath = $this->logo->store('public');
            $filePath = str_replace('public/', 'storage/', $filePath);
            $validatedData['logo'] = $filePath;
        }

        Company::where('id',$this->id)->update($validatedData);

        session()->flash('success', 'Company updated successfully!');
    }
}
