<x-layout title="Home">

    @can('edit', $post)
        <a href="/posts/1/edit">Edit</a>
    @endcan
    
    {{-- @forelse ($tasks as $tak)
        <li>{{ $task }}</li>
    @empty
        <p>There are no active tasks.</p>
    @endforelse --}}
</x-layout>
