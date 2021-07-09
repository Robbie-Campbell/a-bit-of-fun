@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="relative min-h-screen flex flex-col items-center ">
            <div class="flex flex-col mt-2 text-center">
                <div class="bg-white shadow-md  rounded-3xl p-4">
                    <div class="flex-auto ml-3 justify-evenly py-2 h-full">
                        <div class="mx-auto h-full w-full lg:h-48 lg:w-48   lg:mb-0 mb-3">
                            <img style="max-height: 300px;" src="{{asset($profile->profile_image)}}"
                                 alt="Image of {{$profile->first_name}}" class=" w-full  object-scale-down lg:object-cover  lg:h-48 rounded-2xl">
                        </div>
                        <div>
                            <div class="w-full flex-none text-s text-blue-700 font-medium py-3">
                                Username: {{$user->name}}
                            </div>
                            <h2 class="flex-auto text-lg font-medium border-b py-2">Email: {{$user->email}}</h2>
                            <h2 class="flex-auto text-lg font-medium border-b py-2">First Name: @if($profile->first_name){{$profile->first_name}}@else Not set @endif</h2>
                            <h2 class="flex-auto text-lg font-medium border-b py-2">Last Name: @if($profile->last_name){{$profile->last_name}}@else Not set @endif</h2>
                        </div>
                        <div class="flex py-4  text-sm text-gray-600">
                            <div class="flex-1 inline-flex items-center">
                                <p class=""></p>
                            </div>
                        </div>
                    </div>
                    @if($user->is_owner(Auth::id()))
                        <h1 class="p-3 border-t">You have currently made <b>{{$user->count_total_quotes()}}</b> {{ Str::plural('quote', $user->count_total_quotes()) }}</h1>
                        <button
                            class="mb-2 md:mb-0 bg-blue-700 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-blue-800"
                            type="button" aria-label="like"><a href="{{ route('quote.create') }}">Create a quote now</a>
                        </button>
                        <button
                            class="mb-2 md:mb-0 bg-green-700 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-green-800"
                            type="button" aria-label="like"><a href="{{ route('user.edit') }}">Edit Your Profile</a>
                        </button>
                    @else
                        <h1 class="p-3 border-t">This User has made <b>{{$user->count_total_quotes()}}</b> {{ Str::plural('quote', $user->count_total_quotes()) }}</h1>
                        <h1 class="p-3 border-t">This User has <b>{{$user->count_total_followers()}}</b> {{ Str::plural('follower', $user->count_total_followers()) }}</h1>
                    @endif
                    <button
                        class="mb-2 md:mb-0 bg-red-700 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-red-800"
                        type="button" aria-label="like"><a href="{{ route('likes.user_likes', $user->id) }}">View User Likes</a>
                    </button>
                    @if(!$user->is_owner(Auth::id()) && Auth::user()->is_following($user->id))
                        <form method="POST" action="{{ route('user.follow', $user->id) }}">
                            @csrf
                            <button
                                class="mb-2 md:mb-0 bg-blue-700 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-blue-800"
                                type="submit"  aria-label="like">Follow This User
                            </button>
                        </form>
                    @elseif(!$user->is_owner(Auth::id()) && !Auth::user()->is_following($user->id))
                        <form method="POST" action="{{ route('user.unfollow', $user->id) }}">
                            @csrf
                            <button
                                class="mb-2 md:mb-0 bg-blue-700 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-blue-800"
                                type="submit"  aria-label="like">Unfollow this user
                            </button>
                        </form>
                    @endif
                    <button
                        class="mb-2 md:mb-0 bg-red-700 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-red-800"
                        type="button" aria-label="like"><a href="{{ route('user.following', $user->id) }}">View User Follows</a>
                    </button>
                    <button
                        class="mb-2 md:mb-0 bg-red-700 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-red-800"
                        type="button" aria-label="like"><a href="{{ route('user.followers', $user->id) }}">See Who They Follow</a>
                    </button>
                </div>
            </div>
            @foreach($quotes as $quote)
                <div class="flex flex-col mt-5">
                    <div class="bg-white shadow-md  rounded-3xl p-4">
                        <div class="flex-none lg:flex">
                            <div class=" h-full w-full lg:h-48 lg:w-48   lg:mb-0 mb-3">
                                <img style="max-height: 300px;" src="{{asset($quote->image_src)}}"
                                     alt="Image of {{$quote->author}}" class=" w-full  object-scale-down lg:object-cover  lg:h-48 rounded-2xl">
                            </div>
                            <div class="flex-auto ml-3 justify-evenly py-2 h-full">
                                <div class="flex flex-wrap ">
                                    <div class="w-full flex-none text-xs text-blue-700 font-medium ">
                                        <a href="{{route('quote.category', $quote->category_id)}}">{{\App\Models\Category::find($quote->category_id)->title}}</a>
                                    </div>
                                    <h2 class="flex-auto text-lg font-medium">"{{$quote->quote}}"</h2>
                                </div>
                                <p class="mt-3"></p>
                                <div class="flex py-4  text-sm text-gray-600">
                                    <div class="flex-1 inline-flex items-center">
                                        <p class="">{{$quote->author}}</p>
                                    </div>
                                    <div class="flex-1 inline-flex items-center">
                                        <p>{{$quote->created_at}}</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex p-4 pb-2 border-t border-gray-200 "></div>
                                <div class="flex space-x-3 text-sm font-medium">
                                    <div class="flex-auto flex space-x-3">
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
                                    </div>
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
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection
