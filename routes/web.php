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
Route::get('/jobs/{job}', function(Job $job) {
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
Route::get('/jobs/{job}/edit', function(Job $job) {
    return view('jobs.edit', ['job' => $job]);
});

// Update
Route::patch('/jobs/{job}', function(Job $job) {
    // authorize (On hold...)

    //validacija
    request()->validate([
        'job_title' => ['required', 'min:3'], 
        'job_salary' => ['required']
    ]);

    //menjamo podatke u bazi
    $job->update([
        'title' => request('job_title'),
        'salary' => request('job_salary')
    ]);

    //redirect
    return redirect('jobs/' . $job->id);
});

// Destroy
Route::delete('/jobs/{job}', function(Job $job) {
    // authorize (On hold...)

    $job->delete();

    return redirect('/jobs');
});




Route::get('/contact', function () {
    return view('contact');
});










