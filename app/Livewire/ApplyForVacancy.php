<?php

namespace App\Livewire;

use App\Models\Candidate;
use App\Models\Vacancy;
use App\Notifications\NewCandidate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads as LivewireWithFileUploads;
use Throwable;

class ApplyForVacancy extends Component
{
    use LivewireWithFileUploads;

    #[Rule('required|mimes:pdf|max:2024')]
    public $cv;

    public $vacancy;

    public $canApply;

    public function createCandidate()
    {
        $data = $this->validateOnly('cv');
        try {
            // admins cannot create candidates
            if (!Gate::denies('create', Vacancy::class)) {
                session()->flash('error', 'You are not allowed to apply for this vacancy.');
                return redirect()->route('vacancies.show', ['vacancy' => $this->vacancy->id]);
            }
            // Double-check if the candidate already exists before creating
            if ($this->hasApplied()) {
                session()->flash('info', 'You have already applied for this vacancy.');
                return redirect()->route('vacancies.show', ['vacancy' => $this->vacancy->id]);
            }
            // save cv in storage\app\public\candidate_cv
            $cvName = $this->cv->store('candidate_cv', 'public');
            // keep only the file name
            $data['cv'] = str_replace('candidate_cv/', '', $cvName);
            // create a new candidate
            $this->vacancy->candidates()->create([
                'user_id' => Auth::user()->id,
                'cv_path' => $data['cv']
            ]);
            // flash message
            session()->flash('info', 'Your info was sent successfully. Good luck!');
            // the notification is for the user (owner of the post)
            $this->vacancy->recruiter->notify(new NewCandidate($this->vacancy->id, $this->vacancy->title, Auth::user()->id));
            return redirect()->route('vacancies.show', ['vacancy' => $this->vacancy->id]);
        } catch (Throwable $e) {
            session()->flash('error', 'Something went wrong applying for this vacancy.');
            return redirect()->route('vacancies.show', ['vacancy' => $this->vacancy->id]);
        }
    }

    public function mount(Vacancy $vacancy)
    {
        $this->vacancy = $vacancy;
        $this->canApply = !$this->hasApplied();
    }

    public function hasApplied(): bool
    {
        // Check if the user has already applied for this vacancy
        return Candidate::where('vacancy_id', '=', $this->vacancy->id)->where('user_id', '=', Auth::user()->id)->exists();
    }
    public function render()
    {
        return view('livewire.apply-for-vacancy');
    }
}
