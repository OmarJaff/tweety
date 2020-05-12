<div class="border border-blue-400 rounded-lg  px-8 py-6 mb-4 sm:mb-8" >
    <form action="/tweets" method="post">
        @csrf

        <div class="flex w-full border-b focus-within:border-blue-500 mb-6  ">
            <textarea-field></textarea-field>
        </div>

        <footer class="flex justify-between items-center">
            <img src="{{auth()->user()->avatar}}"
                 alt="your avatar"
                 class="rounded-full mr-2 w-10 h-10">
            <publish-button></publish-button>
        </footer>
        @error('body')
        <h1 class="text-red-500 mt-2 font-semibold text-sm">{{$message}}</h1>
        @enderror
    </form>
</div>
