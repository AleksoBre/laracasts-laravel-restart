<x-layout>
    <x-slot:heading>Create Job</x-slot:heading>
    
    <form method="POST" action="/jobs">
        @csrf
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base/7 font-semibold text-gray-900">Create a new job!</h2>
      <p class="mt-1 text-sm/6 text-gray-600">We just need a handfull of details from you.</p>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

        {{-- job employer --}}
        <div class="sm:col-span-4">
          <label for="job_employer" class="block text-sm/6 font-medium text-gray-900">Employer</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
              <select id="job_employer" name="job_employer">
                @foreach ($employers as $employer)
                    <option value="{{$employer->id}}">{{$employer->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>

        {{-- job title --}}
        <div class="sm:col-span-4">
          <x-form-label for="job_title">Job Title</x-form-label>
          <div class="mt-2">
            <x-form-input id="job_title" name="job_title" placeholder="eg. Carpenter" required></x-form-input>
            <x-form-error name="job_title" />
          </div>
        </div>

        {{-- job salary --}}
        <div class="sm:col-span-4">
          <label for="job_salary" class="block text-sm/6 font-medium text-gray-900">Salary</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
              <input id="job_salary" type="text" name="job_salary" placeholder="eg. $80,000" required class="block min-w-0 grow bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"/>
            </div>
            @error('job_salary')
              <p class="mt-1 text-red-500 text-xs font-semibold">{{ $message }}</p>
            @enderror
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</button>
  </div>
</form>


</x-layout>