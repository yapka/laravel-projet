@props(['post', 'list' => false])

{{-- Début du post --}}
<article class="flex flex-col pb-10 border-b lg:flex-row md:pb-16">
    <div class="lg:w-5/12">
        <img class="object-cover w-full max-h-72 lg:max-h-none lg:h-full" src="{{ str_starts_with($post->thumbnail, 'http') ? $post->thumbnail : asset('storage/' . $post->thumbnail) }}">
    </div>
    <div class="flex flex-col items-start mt-5 space-y-5 lg:w-7/12 lg:mt-0 lg:ml-12">
        @if ($post->category)
        <a href="{{ route('posts.byCategory', ['category' => $post->category]) }}" class="text-lg font-bold underline text-slate-900">{{ $post->category->name }}</a>
        @endif
        <h1 class="text-3xl font-bold leading-tight text-slate-900 lg:text-5xl">{{ $post->title }}</h1>
        @if ($post->tags->isNotEmpty())
        <ul class="flex flex-wrap gap-2">
            @foreach ($post->tags as $tag)
            <li><a href="{{ route('posts.byTag', ['tag' => $tag]) }}" class="px-3 py-1 text-sm bg-indigo-700 rounded-full text-indigo-50">{{ $tag->name }}</a></li>
            @endforeach
        </ul>
        @endif
        <p class="text-xl lg:text-2xl text-slate-600">
            @if ($list)
            {{ $post->excerpt }}
            @else
            {!! nl2br(e($post->content)) !!}
            @endif
        </p>
        @if ($list)
        <a href="{{ route('posts.show', ['post' => $post]) }}" class="flex items-center py-5 font-semibold transition rounded-full px-7 bg-slate-900 text-slate-50">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
            </svg>
            Lire l'article
        </a>
        @else
        <time class="text-xs text-slate-400" datetime="{{ $post->created_at }}">@datetime($post->created_at)</time>
        @endif
    </div>
</article>
{{-- Fin du post --}}
