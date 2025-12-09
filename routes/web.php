<?php

use App\Models\Employer;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

// Index
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(5);

    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

// Store
Route::get('/jobs/create', function() {
    return view('jobs.create', ['employers' => Employer::all()]);
});

// Show
Route::get('/jobs/{id}', function($id) { //bilo sta sa wildcard-om stavljam pri dnu routes fajla, jer ako stavim pri vrhu, onda bilo sta posle /jobs/ ce biti ukljuceno u ovu funkciju
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
});

// Insert
Route::post('/jobs', function () {
    request()->validate([
        'job_title' => ['required', 'min:3'], 
        'job_salary' => ['required']
    ]);
    $request = request()->all();
    Job::create([
        'employer_id' => $request['job_employer'],
        'title' => $request['job_title'],
        'salary' => $request['job_salary']
    ]);

    return redirect('jobs.index');
});

// Edit
Route::get('/jobs/{id}/edit', function($id) {
    return view('jobs.edit', ['job' => Job::findOrFail($id)]);
});

// Update
Route::patch('/jobs/{id}', function($id) {
    // authorize (On hold...)

    //validacija
    request()->validate([
        'job_title' => ['required', 'min:3'], 
        'job_salary' => ['required']
    ]);

    //menjamo podatke u bazi
    Job::findOrFail($id)->update([
        'title' => request('job_title'),
        'salary' => request('job_salary')
    ]);

    //redirect
    return redirect('jobs/' . $id);
});

// Destroy
Route::delete('/jobs/{id}', function($id) {
    // authorize (On hold...)

    Job::findOrFail($id)->delete();

    return redirect('/jobs');
});




Route::get('/contact', function () {
    return view('contact');
});










