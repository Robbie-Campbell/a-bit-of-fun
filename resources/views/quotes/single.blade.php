@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="flex h-screen justify-center items-center">
            <div class="max-w-md py-4 px-8 bg-white shadow-lg rounded-lg my-20 m-auto">
                <div class="flex justify-center md:justify-end -mt-16">
                    <img src="{{ asset($quote->image_src)}}" class="w-20 h-20 object-cover rounded-full border-2 border-indigo-500">
                </div>
                <div>
                    <h2 class="text-gray-800 text-3xl font-semibold">{{$quote->author}}</h2>
                    <p class="mt-2 text-gray-600">{{$quote->quote}}</p>
                </div>
                <div class="flex justify-end mt-4 border-b py-2">
                    <a href="#" class="text-xl font-medium text-indigo-500">{{$user->name}}</a>
                </div>
                @auth
                    <button
                        class="my-4 md:mb-0 bg-white px-5 py-2 shadow-sm tracking-wider border text-gray-600 rounded-full hover:bg-gray-100 inline-flex items-center space-x-2 ">
                        <span class="@if($quote->is_liked_by_auth_user()) text-red-600 hover:text-red-700 @else text-red-100 hover:text-red-500 @endif rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                            </svg>
                        </span>
                        @if($quote->is_liked_by_auth_user())
                            <a href="{{route('reply.unlike', $quote->id)}}">Unlike</a>
                        @else
                            <a href="{{route('reply.like', $quote->id)}}">Like</a>
                        @endif
                        <span><b>{{$quote->count_total_likes()}} {{ Str::plural('Like', $quote->count_total_likes()) }}</b></span>
                    </button>
                @endauth
                @guest
                    <button disabled class="my-4 md:mb-0 bg-white px-5 py-2 shadow-sm tracking-wider border text-gray-600 rounded-full hover:bg-gray-100 inline-flex items-center space-x-2 ">
                        <span><b>{{$quote->count_total_likes()}} {{ Str::plural('Like', $quote->count_total_likes()) }}</b></span>
                    </button>
                @endguest
                @if($author)
                    <div class="flex space-x-3 text-sm font-medium mt-4">
                        <button
                            class="mb-2 md:mb-0 bg-blue-700 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-blue-800"
                            type="button" aria-label="like"><a href="{{ route('quote.single', $quote->id) }}">Read more</a>
                        </button>
                        <button
                            class="mb-2 md:mb-0 bg-yellow-400 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-yellow-500"
                            type="button" aria-label="like"><a href="{{ route('quote.edit', $quote->id) }}">Update Post</a>
                        </button>
                        <form action="{{ route('quote.delete', $quote->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button
                                class="mb-2 md:mb-0 bg-red-600 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-red-700"
                                type="submit">Delete Post
                            </button>
                        </form>
                    </div>
                @endif

            </div>
        </div>
    </main>
@endsection
