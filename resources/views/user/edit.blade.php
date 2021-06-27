@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="flex h-screen justify-center items-center">
            <div class="max-w-md py-4 px-8 bg-gray-500 text-white shadow-lg rounded-lg my-20 m-auto">
                <h1 class="w-full bg- text-2xl text-center border-b border-white p-3 font-bold">Update Your Profile</h1>
                <div class="mx-auto h-full w-full lg:h-48 lg:w-48   lg:mb-0 mb-3">
                    <img style="max-height: 300px;" src="{{asset($profile->profile_image)}}"
                         alt="Profile picture" class=" w-full  object-scale-down lg:object-cover  lg:h-48 rounded-2xl">
                </div>
                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="flex flex-wrap ">
                        <label for="first_name" class="block  text-white text-sm font-bold mb-2 sm:mb-4">
                            First Name:
                        </label>

                        <input id="first_name" type="text" class="form-input w-full text-black"
                               name="first_name" value="{{ old('first_name', $profile->first_name) }}" autocomplete="first_name" autofocus>
                    </div>

                    <div class="flex flex-wrap">
                        <label for="last_name" class="block  text-white text-sm font-bold mb-2 sm:mb-4">
                            Last Name:
                        </label>

                        <input id="last_name" type="text" class="form-input w-full text-black"
                               name="last_name" value="{{ old('last_name', $profile->first_name) }}" autocomplete="last_name" autofocus>
                    </div>

                    <div class="overflow-hidden relative w-64 mt-4 mb-4">
                        <input type="file" value="{{old('profile_image', $profile->profile_image)}}" name="image">
                    </div>
                    <button type="submit"
                            class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                        Update Your Profile
                    </button>
                </form>
            </div>
        </div>
    </main>
@endsection
