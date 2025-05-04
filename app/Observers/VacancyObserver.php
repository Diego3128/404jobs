<?php

namespace App\Observers;

use App\Models\Vacancy;
use Illuminate\Support\Facades\File;

class VacancyObserver
{
    /**
     * Handle the Vacancy "created" event.
     */
    public function created(Vacancy $vacancy): void
    {
        //
    }

    /**
     * Handle the Vacancy "updated" event.
     */
    public function updated(Vacancy $vacancy): void
    {
        //
    }

    /**
     * Handle the Vacancy "deleted" event.
     */
    public function deleted(Vacancy $vacancy): void
    {
        //delete associated image
        $imagePath = storage_path('app/public/vacancies/' . $vacancy->image);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
    }

    /**
     * Handle the Vacancy "restored" event.
     */
    public function restored(Vacancy $vacancy): void
    {
        //
    }

    /**
     * Handle the Vacancy "force deleted" event.
     */
    public function forceDeleted(Vacancy $vacancy): void
    {
        //
    }
}
