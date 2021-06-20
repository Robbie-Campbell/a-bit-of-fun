@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="flex h-screen justify-center items-center">
            <div class="max-w-md py-4 px-8 bg-gray-400 shadow-lg rounded-lg my-20 m-auto">
                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="flex flex-wrap">
                        <label for="author" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            Author:
                        </label>

                        <input id="author" type="text" class="form-input w-full @error('author')  border-red-500 @enderror"
                               name="author" value="{{ old('author') }}" required autocomplete="author" autofocus>
                    </div>

                    <div class="flex flex-wrap">
                        <label for="quote" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            Quote:
                        </label>

                        <textarea id="quote"
                               class="form-input w-full @error('quote') border-red-500 @enderror" name="quote"
                                  required autocomplete="quote"></textarea>
                    </div>

                    <div class="col-md-6">
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="flex flex-wrap">
                        <label for="category" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            Category:
                        </label>
                        <select name="category" id="category" class="text-gray-900 rounded-lg border-0 form-select p-0 pl-3.5 pr-[1.875rem] h-9 w-full sm:text-sm font-medium focus:shadow-none focus-visible:ring-2 focus-visible:ring-teal-500" style="background-image:none;">
                            @foreach($categories as $category)
                                <option name={{$category->id}} value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit"
                            class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                        Create Quote
                    </button>
                </form>
            </div>
        </div>
    </main>
@endsection
