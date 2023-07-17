<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>
    <x-slot name="nav">
        <div class="space-x-4">
            {{-- Index --}}
            <x-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
                {{ __('Index') }}
            </x-nav-link>
            {{-- create --}}
            <x-nav-link href="{{ route('posts.create') }}" :active="request()->routeIs('posts.create')">
                {{ __('Create') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6">
                    <x-form action="{{ route('posts.store') }}" has-files>
                        {{-- <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data"> --}}
                            {{-- @csrf --}}
                            {{-- Cover Image --}}
                            <div class="space-y-6">
                                <div>
                                    <x-label for="cover_image" value="{{ __('Cover Image') }}" />
                                    <x-input class="block w-full mt-1" id="cover_image" type="file" name="cover_image" />
                                    <span class="mt-2 text-xs text-gray-500">File type: jpg,png only</span>
                                </div>
                                {{-- title --}}
                                <div>
                                    <x-label for="title" value="{{ __('Title') }}" />
                                    <x-input id="title" class="block w-full mt-1" type="text" name="title"
                                        :value="old('title')" autofocus autocomplete="title" />
                                    <span class="mt-2 text-xs text-gray-500">Maximum 200 characters</span>
                                    <x-input-error for="title" class="mt-2" />
                                </div>
                                {{-- Category --}}
                                <div>
                                    <x-label for="category_id" value="{{ __('Categories') }}" />
                                    <select name="category_id" id="category_id" class="border-gray-300 block w-50 mt-1 dark:border-gray-700
                             dark:bg-gray-900 dark:text-gray-300
                              focus:border-indigo-500 dark:focus:border-indigo-600
                               focus:ring-indigo-500
                                dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                        <option value="">Please Select a Category</option>

                                        @foreach ($categories as $category)

                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                </div>
                                {{-- Body --}}
                                <div>
                                    <x-label for="body" value="{{ __('Body') }}" />
                                    <x-trix name="body" styling="block w-full mt-1 overflow-y-scroll h-96"></x-trix>
                                    <x-input-error for="body" class="mt-2" />


                                </div>
                                {{-- Schedule --}}
                                <div>
                                    <x-label class="block w-full mt-1" for="published_at" value="{{ __('Schedule Date') }}" />
                                    <x-pikaday name="published_at" styling="block w-full mt-1" format="YYYY-MM-DD" />
                                    <x-input-error for="published_at" class="mt-2 block w-full" />
                                </div>
                                {{-- Tags --}}
                                <x-tags :tags="$tags" />


                                {{-- Meta Description --}}
                                <div>
                                    <x-label for="meta_description" value="{{ __('Meta_description') }}" />
                                    <x-trix name="meta_description" styling="overflow-y-scroll h-42"></x-trix>
                                    <x-input-error for="meta_description" class="mt-2" />


                                </div>
                            </div>

                            <x-button class="mt-12">
                                {{ __('Create') }}
                            </x-button>


                    </x-form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>