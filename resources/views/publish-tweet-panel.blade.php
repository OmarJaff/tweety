<div class="border border-blue-400 rounded-lg  px-8 py-6 mb-8" >
    <form action="/tweets" method="post">
        @csrf

        <div class="flex w-full border-b focus-within:border-blue-500 mb-6 ">

        <textarea
                  required
                  name="body"
                  id=""
                  cols="30"
                  class="w-full py-4  focus:outline-none"
                  placeholder="what's up dock?">

        </textarea>
        </div>

        <footer class="flex justify-between">
            <img src="{{auth()->user()->getAvatarAttribute()}}"
                 alt="your avatar"
                 class="rounded-full mr-2 w-10 h-10">
            <button  type="submit"  class=" bg-blue-500 shadow px-2 py-2 rounded-lg text-white disabled:opacity-50  disabled:cursor-not-allowed ">Tweet-a-roo!</button>
        </footer>
        @error('body')
        <h1 class="text-red-500 mt-2 font-semibold text-sm">{{$message}}</h1>
        @enderror
    </form>
</div>
