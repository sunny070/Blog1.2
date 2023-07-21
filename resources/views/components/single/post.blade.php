<div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
    <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
      <a href="#" class="flex flex-wrap no-underline hover:no-underline">
        <img src="{{ Storage::url('images/' . $post->cover_image) }}" class="w-full text-gray-600 text-xs md:text-sm px-6">
          
        <div class="w-full font-bold text-xl text-gray-800 px-6">
          {{ $post->title }}
        </div>
        <p class="text-gray-800 text-base px-6 mb-5">
          {{-- The bang bang is needed --}}
          {!! Str::limit(($post->body), 200, '...') !!}

          {{-- {{ Str::limit(($post->body), 200, '...') }} --}}
        </p>
      </a>
    </div>
    <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
      <div class="flex items-center justify-start">
        <a  href="#" class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
          Read More
        </a>
      </div>
    </div>
  </div>