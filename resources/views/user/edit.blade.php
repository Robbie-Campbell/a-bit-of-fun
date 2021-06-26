@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="flex h-screen justify-center items-center">
            <div class="max-w-md py-4 px-8 bg-gray-500 text-white shadow-lg rounded-lg my-20 m-auto">
                <h1 class="w-full bg- text-2xl text-center border-b border-white p-3 font-bold">Edit This quote</h1>
                <div class=" h-full w-full lg:h-48 lg:w-48   lg:mb-0 mb-3">
                    <img style="max-height: 300px;" src="{{asset($quote->image_src)}}"
                         alt="Just a flower" class=" w-full  object-scale-down lg:object-cover  lg:h-48 rounded-2xl">
                </div>
                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ url('update/' . $quote->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="flex flex-wrap ">
                        <label for="author" class="block  text-white text-sm font-bold mb-2 sm:mb-4">
                            Author:
                        </label>

                        <input id="author" type="text" class="form-input w-full text-black"
                               name="author" value="{{ old('author', $quote->author) }}" required autocomplete="author" autofocus>
                    </div>

                    <div class="flex flex-wrap">
                        <label for="quote" class="block  text-white text-sm font-bold mb-2 sm:mb-4">
                            Quote:
                        </label>

                        <textarea id="quote"
                                  class="form-input w-full  text-black" name="quote"
                                  required autocomplete="quote">{{old('quote', $quote->quote)}}</textarea>
                    </div>

                    <div class="overflow-hidden relative w-64 mt-4 mb-4">
                        <input type="file" value="{{old('image_src', $quote->image_src)}}" name="image">
                    </div>

                    <div class="flex flex-wrap">
                        <label for="category" class="block  text-white text-sm font-bold mb-2 sm:mb-4">
                            Category:
                        </label>
                        <select name="category" id="category" class="text-gray-900 rounded-lg border-0 form-select p-0 pl-3.5 pr-[1.875rem] h-9 w-full sm:text-sm font-medium focus:shadow-none focus-visible:ring-2 focus-visible:ring-teal-500" style="background-image:none;">
                            @foreach($categories as $category)
                                <option name="{{$category->id}}" value="{{$category->id}}" @if($category->id == $quote->category_id) selected @endif>{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit"
                            class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                        Update Quote
                    </button>
                </form>
            </div>
        </div>
    </main>
@endsection
