<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Salary;
use App\Models\Vacancy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Throwable;

class CreateVacancy extends Component
{
    use WithFileUploads;
    // default categories
    public $salaryRanges = [];
    public $categories = [];
    // form fields and rules
    public $title;
    public $salary;
    public $category;
    public $company;
    public $deadline;
    public $description;
    public $image;

    protected $rules = [
        'title' => 'required|string',
        'salary' => 'required',
        'category' => 'required',
        'company' => 'required|string',
        'deadline' => 'required',
        'description' => 'required',
        'image' => 'required|image|max:1048'
    ];

    public function createVacancy()
    {
        try {
            Gate::authorize('create', Vacancy::class);
            $data = $this->validate();
            // save image
            $imageName = $this->image->store('vacancies', 'public');
            // keep only image name with extension
            $imageName = str_replace('vacancies/', '', $imageName);
            // save vacancy
            Vacancy::create([
                'title' => $data['title'],
                'company' => $data['company'],
                'deadline' => $data['deadline'],
                'description' => $data['description'],
                'image' => $imageName,
                'salary_id' => $data['salary'],
                'category_id' => $data['category'],
                'user_id' => Auth::user()->id
            ]);
            // redirect with message
            return redirect()->route('vacancies.index')->with('success', 'A new vacancy was created.');
        } catch (Throwable $e) {
            return redirect()->route('vacancies.index')->with('error', 'Vacancy not created.');
        }
    }

    public function mount()
    {
        $salaryRanges = Salary::all();
        $categories = Category::all();
        $this->salaryRanges = $salaryRanges;
        $this->categories = $categories;
    }

    public function render()
    {
        return view('livewire.create-vacancy');
    }
}
