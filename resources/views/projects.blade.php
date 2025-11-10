<x-layout>
    <ul>
        @foreach ($projects as $project)
            <li>{{$project}}</li>
        @endforeach
    </ul>
</x-layout>