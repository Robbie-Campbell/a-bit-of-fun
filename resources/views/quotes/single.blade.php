@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="flex h-screen justify-center items-center">
            <div class="max-w-full py-4 px-8 bg-white shadow-lg rounded-lg my-20 m-auto">
                <div class="flex justify-center md:justify-end -mt-16">
                    <img src="{{ asset($quote->image_src)}}" class="w-20 h-20 object-cover rounded-full border-2 border-indigo-500" alt="Image of {{$quote->author}}">
                </div>
                <div>
                    <a class="mb-3 w-full flex-none text-m text-blue-700 font-medium " href="{{route('quote.category', $quote->category_id)}}">{{\App\Models\Category::find($quote->category_id)->title}}</a>
                    <h2 class="text-gray-800 text-3xl font-semibold">{{$quote->author}}</h2>
                    <p class="mt-2 text-gray-600">"{{$quote->quote}}"</p>
                </div>
                <div class="flex justify-end mt-4 border-b py-2">
                    <a href="{{route('user.dashboard', $user->id)}}" class="text-xl font-medium text-indigo-500">{{$user->name}}</a>
                </div>
                @auth
                    <div class="flex">
                        <button id="like{{$quote->id}}" data-id="{{$quote->id}}"
                            class="mb-2 md:mb-0 bg-white px-5 py-2 shadow-sm tracking-wider border text-gray-600 rounded-full hover:bg-gray-100 inline-flex items-center space-x-2
                            like @if($quote->is_liked_by_auth_user()) hidden @endif">
                            <span class="text-red-100 hover:text-red-500 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                  <path data-id="{{$quote->id}}" fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                </svg>
                            </span>
                            <span data-id="{{$quote->id}}" class="ml-2">Like</span>
                        </button>
                        <button id="unlike{{$quote->id}}" data-id="{{$quote->id}}"
                            class="mb-2 md:mb-0 bg-white px-5 py-2 shadow-sm tracking-wider border text-gray-600 rounded-full hover:bg-gray-100 inline-flex items-center space-x-2
                            unlike @if(!$quote->is_liked_by_auth_user()) hidden @endif">
                            <span class="text-red-600 hover:text-red-700 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                  <path data-id="{{$quote->id}}" fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                </svg>
                            </span>
                            <span data-id="{{$quote->id}}" class="ml-2">Unlike</span>
                        </button>
                        <span class="mb-2 ml-5 md:mb-0 bg-white px-5 py-2 shadow-sm tracking-wider border text-gray-600 rounded-full hover:bg-gray-100 inline-flex items-center">
                            <b data-id="{{$quote->id}}"><span class="total{{ $quote->id }} mr-1">{{$quote->count_total_likes()}}</span></b> <span id="total_likes_text{{$quote->id}}">{{ Str::plural('Like', $quote->count_total_likes()) }}</span>
                        </span>
                    </div>
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
                        @if($user->is_owner(Auth::id()))
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
                        @endif
                    </div>
                @endif

            </div>
        </div>
    </main>
@endsection
