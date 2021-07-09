@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="relative min-h-screen flex flex-col items-center">
            <div class="grid mt-8  gap-8 grid-cols-1 md:grid-cols-2 xl:grid-cols-2">
                @foreach($users as $user)
                    <div class="flex flex-col mt-2 text-center">
                        <div class="bg-white shadow-md  rounded-3xl p-4">
                            <div class="flex-auto ml-3 justify-evenly py-2 h-full">
{{--                                <div class="mx-auto h-full w-full lg:h-48 lg:w-48   lg:mb-0 mb-3">--}}
{{--                                    <img style="max-height: 300px;" src="{{\App\Models\Profile::where()}}"--}}
{{--                                         alt="Image of {{$profile->first_name}}" class=" w-full  object-scale-down lg:object-cover  lg:h-48 rounded-2xl">--}}
{{--                                </div>--}}
                                <div>
                                    <div class="w-full flex-none text-s text-blue-700 font-medium py-3">
                                        Username: {{$user->name}}
                                    </div>
                                    <h2 class="flex-auto text-lg font-medium border-b py-2">Email: {{$user->email}}</h2>
{{--                                    <h2 class="flex-auto text-lg font-medium border-b py-2">First Name: @if($profile->first_name){{$profile->first_name}}@else Not set @endif</h2>--}}
{{--                                    <h2 class="flex-auto text-lg font-medium border-b py-2">Last Name: @if($profile->last_name){{$profile->last_name}}@else Not set @endif</h2>--}}
                                </div>
                                <div class="flex py-4  text-sm text-gray-600">
                                    <div class="flex-1 inline-flex items-center">
                                        <p class=""></p>
                                    </div>
                                </div>
                            </div>
                            <button
                                class="mb-2 md:mb-0 bg-red-700 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-red-800"
                                type="button" aria-label="like"><a href="{{ route('likes.user_likes', $user->id) }}">View User Likes</a>
                            </button>
                            @if(Auth::user()->is_following($user->id))
                                <form method="POST" action="{{ route('user.follow', $user->id) }}">
                                    @csrf
                                    <button
                                        class="mb-2 md:mb-0 bg-blue-700 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-blue-800"
                                        type="submit"  aria-label="like">Follow This User
                                    </button>
                                </form>
                            @elseif(!Auth::user()->is_following($user->id))
                                <form method="POST" action="{{ route('user.unfollow', $user->id) }}">
                                    @csrf
                                    <button
                                        class="mb-2 md:mb-0 bg-blue-700 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-blue-800"
                                        type="submit"  aria-label="like">Unfollow this user
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
