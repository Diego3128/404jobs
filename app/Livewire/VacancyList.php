<?php

namespace App\Livewire;

use App\Models\Vacancy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;
use Throwable;

class VacancyList extends Component
{
    use WithPagination;

    public $showConfirmModal = false;
    public  $vacancyToDeleteId;

    public function confirmDelete($id)
    {
        $this->vacancyToDeleteId = $id;
        $this->showConfirmModal = true;
    }

    public function delete()
    {
        try {
            $vacancy = Vacancy::findOrFail($this->vacancyToDeleteId);
            Gate::authorize('delete', $vacancy);
            $vacancy->delete(); //image is deleted by the Vacancy observer
            $this->showConfirmModal = false;
            $this->vacancyToDeleteId = '';
            $this->dispatch('create-notification', ['type' => 'info', 'text' => 'Vacancy deleted successfully.']);
        } catch (Throwable $e) {
            session()->flash('error', 'The vacancy could not be deleted.');
            return redirect()->route('vacancies.index');
        }
    }
    public function render()
    {
        $vacancies = Vacancy::where('user_id', Auth::user()->id)->paginate(8);

        return view('livewire.vacancy-list', ['vacancies' => $vacancies]);
    }
}
