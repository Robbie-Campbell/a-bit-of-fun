@extends('layouts.app')

@section('content')
<style>
    .component {
        font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
    }

    /* -- create the quotation marks -- */
    blockquote:before,
    blockquote:after {
        font-family: FontAwesome;
        position: absolute;
        color: #000;
        font-size: 22px;
    }

    blockquote:before {
        content: "\f10d";
        top: -12px;
        margin-right: -20px;
        right: 100%;
    }

    blockquote:after {
        content: "\f10e";
        margin-left: -20px;
        left: 100%;
        top: auto;
        bottom: -20px;
    }
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="relative min-h-screen flex flex-col items-center justify-center ">
        <div class="grid mt-8  gap-8 grid-cols-1 md:grid-cols-2 xl:grid-cols-2">
            @foreach($quotes as $quote)
                <div class="flex flex-col">
                    <div class="bg-white shadow-md  rounded-3xl p-4">
                        <div class="flex-none lg:flex">
                            <div style="min-width:30%;" class="h-full w-full lg:h-48 lg:w-48   lg:mb-0 mb-3">
                                <img src="{{asset($quote->image_src)}}"
                                     alt="Just a flower" class=" w-full  object-scale-down lg:object-cover  lg:h-48 rounded-2xl">
                            </div>
                            <div class="flex-none ml-3 justify-evenly py-2 h-full">
                                <div class="w-full flex-none text-xs text-blue-700 font-medium ">
                                    {{\App\Models\Category::find($quote->category_id)->title}}
                                </div>
                                <div class="flex flex-wrap text-right">
                                    <section class="component mx-1 md:mx-10">
                                        <blockquote  class="relative p-5 text-black w-full m-1">
                                            {{$quote->quote}}
                                            <br>
                                            <cite> - {{$quote->author}}</cite>
                                        </blockquote>
                                    </section>
                                </div>
                                <p class="mt-3"></p>
                                <div class="flex py-4  text-sm text-gray-600">
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
    </div>
</main>
@endsection
