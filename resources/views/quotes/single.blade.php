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
                @if($author)
                    <div class="flex justify-end mt-4">
                    <a
                        class="text-xl font-medium text-indigo-500"
                        type="button" href="{{ url('edit/' . $quote->id) }}">Update Post</a>
                    </div>
                @endif

            </div>
        </div>
    </main>
@endsection
