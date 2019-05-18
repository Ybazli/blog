@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex justify-between">
            <p class="text-grey-light text-sm mb-5">
                <a href="{{ route('home') }}"
                   class="text-grey-light no-underline hover:text-grey-dark">
                    Dashboard
                </a>
                /<span class="text-grey-light no-underline">
                    Tag
                </span>
            </p>
            <div>
                <a href="{{ route('tags.create') }}"
                   class="p-3 bg-indigo-light text-white no-underline text-xs rounded lg:hover:bg-indigo-dark">
                    Create a Tag
                </a>
            </div>
        </div>

        @include('partials.search' , ['type' => 'tags'])

        <div class="lg:flex lg:flex-wrap">
            @foreach($tags as $tag)
                <div class="lg:w-1/5">
                    <div class="relative bg-white rounded shadow mb-4 mr-4 h-24 border-l-4 border-indigo-light">

                        <div class="pl-2 py-5">
                            <div>
                                <a href="{{ route('tags.update' , $tag) }}"
                                   class="no-underline text-indigo-light ">
                                    {{ $tag->name }}
                                </a>
                            </div>

                            <div class="absolute pin-x pin-b flex justify-between py-4 mx-3">

                                <div>
                                    <p class="text-xs italic text-grey-dark">
                                        {{ $tag->posts->count() }}
                                        Posts
                                    </p>
                                </div>

                                <div>
                                    <form action="{{ route('tags.delete' , $tag) }}"
                                          method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit"
                                                class="text-red-light mr-4">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center">
            {{ $tags->links() }}
        </div>


    </div>
@endsection