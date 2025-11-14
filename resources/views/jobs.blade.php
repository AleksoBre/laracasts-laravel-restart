<x-layout>
    <x-slot:heading>Jobs</x-slot:heading>

    <ul>
        @foreach ($jobs as $job)
            <li>
                <a href="/jobs/{{ $job['id'] }}" class="text-blue hover:underline">
                    <strong>{{$job['title']}}</strong>: Pays <strong>{{ $job['salary'] }}</strong> per year.
                </a>
            </li>
            <br>
        @endforeach
    </ul>

</x-layout>