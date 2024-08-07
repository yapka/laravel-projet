<x-default-layout>
    <div class="space-y-10 md:space-y-16">

        @forelse ($posts as $post)

            <x-post :$post list />

            @empty
            <p class="text-center text-slate-400">Aucun Resultat</p>

        @endforelse

        {{ $posts->links() }}

    </div>
</x-default-layout>
