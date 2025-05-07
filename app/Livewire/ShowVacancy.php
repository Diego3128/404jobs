<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Salary;
use App\Models\Vacancy;
use Livewire\Component;

class ShowVacancy extends Component
{
    public $vacancy;

    public function render()
    {
        return view('livewire.show-vacancy');
    }
}
