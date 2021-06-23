@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="relative min-h-screen flex flex-col items-center ">
            <div class="flex flex-col mt-2">
                <div class="bg-white shadow-md  rounded-3xl p-4">
                    <div class="flex-auto ml-3 justify-evenly py-2 h-full">
                        <div class="flex flex-wrap ">
                            <div class="w-full flex-none text-xs text-blue-700 font-medium ">
                                Username: {{$user->name}}
                            </div>
                            <h2 class="flex-auto text-lg font-medium">Email: {{$user->email}}</h2>
                        </div>
                        <p class="mt-3"></p>
                        <div class="flex py-4  text-sm text-gray-600">
                            <div class="flex-1 inline-flex items-center">
                                <p class=""></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach($quotes as $quote)
                <div class="flex flex-col w-full mt-5">
                    <div class="bg-white shadow-md  rounded-3xl p-4">
                        <div class="flex-none lg:flex">
                            <div class=" h-full w-full lg:h-48 lg:w-48   lg:mb-0 mb-3">
                                <img src="{{asset($quote->image_src)}}"
                                     alt="Just a flower" class=" w-full  object-scale-down lg:object-cover  lg:h-48 rounded-2xl">
                            </div>
                            <div class="flex-auto ml-3 justify-evenly py-2 h-full">
                                <div class="flex flex-wrap ">
                                    <div class="w-full flex-none text-xs text-blue-700 font-medium ">
                                        {{\App\Models\Category::find($quote->category_id)->title}}
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
                                        <button
                                            class="mb-2 md:mb-0 bg-white px-5 py-2 shadow-sm tracking-wider border text-gray-600 rounded-full hover:bg-gray-100 inline-flex items-center space-x-2 ">
                                <span class="text-green-400 hover:text-green-500 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                      <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                    </svg>
                                </span>
                                            <span>0 Likes</span>
                                        </button>
                                    </div>
                                    <button
                                        class="mb-2 md:mb-0 bg-gray-900 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-gray-800"
                                        type="button" aria-label="like"><a href="{{ url('quote/' . $quote->id) }}">Read more</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection
