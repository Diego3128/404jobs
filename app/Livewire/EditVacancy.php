<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Salary;
use App\Models\Vacancy;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Throwable;

class EditVacancy extends Component
{
    use WithFileUploads;
    // default categories
    public $salaryRanges = [];
    public $categories = [];
    //
    public int $vacancyId;
    // form fields
    public string $title;
    public int $salary;
    public int $category;
    public string $company;
    public $deadline;
    public string $description;
    public $image;
    public $new_image;

    protected $rules = [
        'title' => 'required|string|max:255',
        'salary' => 'required|int',
        'category' => 'required|int',
        'company' => 'required|string|max:255',
        'deadline' => 'required|date',
        'description' => 'required|string|max:65500',
        'new_image' => 'nullable|image|max:1048'
    ];

    public function mount(Vacancy $vacancy)
    {
        $this->vacancyId = $vacancy->id;
        $this->salaryRanges = Salary::all();
        $this->categories = Category::all();
        // init values with created vacancy
        $this->title = $vacancy->title;
        $this->salary = $vacancy->salary_id;
        $this->category = $vacancy->category_id;
        $this->company = $vacancy->company;
        $this->deadline =  Carbon::parse($vacancy->deadline)->format('Y-m-d');
        $this->description = $vacancy->description;
        $this->image = $vacancy->image;
    }

    private function handleImageUpload(Vacancy $vacancy)
    {
        if ($this->new_image) {
            // save new image in storage\app\public\vacancies
            $imageName = $this->new_image->store('vacancies', 'public');
            // keep only image name with extension and add to the $data array
            $imageName = str_replace('vacancies/', '', $imageName);
            // delete previous from the storage
            $oldImagePath = storage_path('app/public/vacancies/' . $vacancy->image);
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
            return $imageName;
        }
        return $vacancy->image;
    }
    public function updateVacancy()
    {
        try {
            $data = $this->validate();
            $vacancy = Vacancy::find($this->vacancyId);

            Gate::authorize('update', $vacancy);

            $vacancy->update([
                'title' => $data['title'],
                'salary_id' => $data['salary'],
                'category_id' => $data['category'],
                'company' => $data['company'],
                'description' => $data['description'],
                'deadline' => $data['deadline'],
                'image' => $this->handleImageUpload($vacancy)
            ]);
            Session::flash('success', 'Vacancy updated.');
            return redirect()->route('vacancies.index');
        } catch (Throwable $e) {
            return redirect()->route('vacancies.index')->with('error', 'Vacancy not updated.');
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function render()
    {
        return view('livewire.edit-vacancy');
    }
}
