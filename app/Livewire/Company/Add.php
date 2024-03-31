<?php

namespace App\Livewire\Company;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Company;

class Add extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $website;
    public $logo;

    public function render()
    {
        return view('livewire.company.add');
    }

    public function store(){

        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
            'logo' => 'nullable|image|dimensions:min_width=100,min_height=100',
        ]);

        if ($this->logo) {
            $filePath = $this->logo->store('public');
            $filePath = str_replace('public/', 'storage/', $filePath);
            $validatedData['logo'] = $filePath;
        }

        Company::create($validatedData);

        $this->reset(['name', 'email', 'website', 'logo']);

        session()->flash('success', 'Company created successfully!');
    }

}
