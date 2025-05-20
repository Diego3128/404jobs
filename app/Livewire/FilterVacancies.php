<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Salary;
use Livewire\Component;

class FilterVacancies extends Component
{
    public $searchterm;
    public $category;
    public $salary;

    public function readFilters()
    {
        $this->dispatch('searchVacancies', $this->searchterm, $this->category, $this->salary);
    }

    public function render()
    {
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.filter-vacancies', compact('salaries', 'categories'));
    }
}
