<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index() {
        $jobs = Job::with('employer')->latest()->simplePaginate(5);

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }
    public function create() {
        return view('jobs.create', ['employers' => Employer::all()]);
    }
    public function show(Job $job) {
        return view('jobs.show', ['job' => $job]);
    }
    public function store() {
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
    }
    public function edit(Job $job) {
        return view('jobs.edit', ['job' => $job]);
    }
    public function update(Job $job) {
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
    }
    public function destroy(Job $job) {
        // authorize (On hold...)

        $job->delete();

        return redirect('/jobs');
    }
}
