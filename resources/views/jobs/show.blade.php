<x-layout>
    <x-slot:heading>{{ $job->title }}</x-slot:heading>
    Pays: {{ $job->salary }}.
    
    <div>
        <x-button class="mt-2" href="/jobs/{{ $job->id }}/edit">Edit</x-button>
    </div>

</x-layout>