<?php

namespace App\Livewire;

use App\Models\Vacancy;
use Livewire\Component;
use Livewire\WithPagination;

class HomeVacancies extends Component
{
    use WithPagination;
    public $searchterm;
    public $category;
    public $salary;

    protected $listeners = ['searchVacancies' => 'search'];

    public function search($searchterm, $category, $salary)
    {
        $this->searchterm = $searchterm;
        $this->category = $category;
        $this->salary = $salary;
    }
    public function render()
    {
        // bring all vacancies or only the ones that match a search term
        $vacancies = Vacancy::when($this->searchterm, function ($query) {
            $query->where('title', 'LIKE', '%' . $this->searchterm . '%');
        })->when($this->searchterm, function ($query) {
            $query->orWhere('description', 'LIKE', '%' . $this->searchterm . '%');
        })->when($this->category, function ($query) {
            $query->where('category_id', '=', $this->category);
        })->when($this->salary, function ($query) {
            $query->where('salary_id', '=', $this->salary);
        })->paginate(6);

        return view('livewire.home-vacancies', compact('vacancies'));
    }
}
