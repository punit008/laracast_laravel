<x-layout>

    {{-- @foreach ($posts as $post)

            <article>
                <h1>

                    <a href="/post/{{ $post->slug }} ">{{ $post->title }} </a>

                </h1>
                <p>
                    By <a href="/author/{{ $post->author->username }}">{{ $post->author->name }}</a>
                    <a href="/categories/{{ $post->category->slug }}">
                        {{ $post->category->name }}
                    </a>
                </p>
                <div>
                    {{ $post->excerpt }}
                </div>
            </article>

        @endforeach --}}
        
     @include('_post-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">    

        @if ($posts->count())

            <x-post-grid :posts="$posts"></x-post-grid>

        @else

            <p>No Post Yet.</p>

        @endif


        {{-- <div class="lg:grid lg:grid-cols-3">
            <x-post-card  :post= $post></x-post-card>
            <x-post-card  :post= $post></x-post-card>
            <x-post-card  :post= $post></x-post-card>
        </div> --}}

    </main> 

</x-layout>
