<x-layout>
    <x-slot:heading>Jobs</x-slot:heading>

    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div class="text-blue-500 font-bold text-small">{{ $job->employer->name }}</div>
                <div>
                    <strong>{{$job['title']}}</strong>: Pays <strong>{{ $job['salary'] }}</strong> per year.
                </div>
            </a>
        @endforeach
    </div>

</x-layout>