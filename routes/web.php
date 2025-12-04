<?php

use App\Models\Employer;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs/create', function() {
    return view('jobs.create', ['employers' => Employer::all()]);
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(2);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

Route::post('/jobs', function() {
    $new_job = request()->all();
    Job::create([
        'employer_id' => $new_job['job_employer'],
        'title' => $new_job['job_title'],        
        'salary' => $new_job['job_salary']        
    ]);

    return redirect('/jobs');
});

Route::get('/jobs/{id}', function($id) {    
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});










