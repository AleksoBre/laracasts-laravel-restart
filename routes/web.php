<?php

use App\Models\Employer;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(2);

    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/create', function() {
    return view('jobs.create', ['employers' => Employer::all()]);
});

Route::get('/jobs/{id}', function($id) { //bilo sta sa wildcard-om stavljam pri dnu routes fajla, jer ako stavim pri vrhu, onda bilo sta posle /jobs/ ce biti ukljuceno u ovu funkciju
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
});

Route::post('/jobs', function () {
    //validation
    $request = request()->all();
    Job::create([
        'employer_id' => $request['job_employer'],
        'title' => $request['job_title'],
        'salary' => $request['job_salary']
    ]);

    return redirect('jobs.index');
});



Route::get('/contact', function () {
    return view('contact');
});










