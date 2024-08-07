<x-default-layout :title="$post->title">
    <div class="space-y-10 md:space-y-16">
        <x-post :$post />
        @auth
        <form action="{{ route('posts.comment', ['post'=>$post]) }}">
            @csrf
            <div class="flex h-12">
                <input class="w-full px-5 rounded-lg bg-slate-50 text-slate-900 focus:outline focus:outline-2 focus:outline-indigo-500" type="text" name="comment" placeholder="Quelque chose à rajouter ? 🎉" autocomplete="off">
                <button class="flex items-center justify-center w-12 ml-2 bg-indigo-700 rounded-full shrink-0 text-indigo-50">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                    </svg>
                </button>
            </div>
            @error('comment')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </form>
        @endauth
        <div class="space-y-8">
            @foreach ($post->comments as $comment)
            <div class="flex p-6 rounded-lg bg-slate-50">
                <img class="object-cover w-10 h-10 rounded-full sm:w-12 sm:h-12" src="{{ Gravatar::get($comment->user->email) }}" alt="Image de profil de {{ $comment->user->name }}">
                <div class="flex flex-col ml-4">
                    <div class="flex flex-col sm:flex-row sm:items-center">
                        <h2 class="text-2xl font-bold text-slate-900">{{ $comment->user->name }}</h2>
                        <time class="mt-2 text-xs sm:mt-0 sm:ml-4 text-slate-400" datetime="{{ $comment->created_at }}">@datetime($comment->created_at)</time>
                    </div>
                    <p class="mt-4 text-slate-800 sm:leading-loose">{{ $comment->content }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-default-layout>
