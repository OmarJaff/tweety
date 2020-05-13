<x-app>

    <div class="my-8 py-2 sm:py-3 border-2 border-gray-500 @error('search') border-red-500 @enderror rounded-lg flex w-full">
        <form action="/explore" method="post" class="w-full flex" role="search">
            @csrf
            <input type="text"
                   class="flex flex-1 focus:outline-none px-4 py-1 "
                    name="search" id="search" placeholder="search for friends" required>
            <button type="submit" class="flex  items-center text-gray-800 mx-4 focus:outline-none">
                <svg class="text-gray-500 h-6 w-6  sm:w-8 sm:h-8" width="20" height="20" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4C5.79086 4 4 5.79086 4 8C4 10.2091 5.79086 12 8 12C10.2091 12 12 10.2091 12 8C12 5.79086 10.2091 4 8 4ZM2 8C2 4.68629 4.68629 2 8 2C11.3137 2 14 4.68629 14 8C14 9.29583 13.5892 10.4957 12.8907 11.4765L17.7071 16.2929C18.0976 16.6834 18.0976 17.3166 17.7071 17.7071C17.3166 18.0976 16.6834 18.0976 16.2929 17.7071L11.4765 12.8907C10.4957 13.5892 9.29583 14 8 14C4.68629 14 2 11.3137 2 8Z" fill="currentColor"/>
                </svg>
            </button>
        </form>
        @error('search')
        <span class="text-xs p-2 text-red-500 font-medium" role="alert">
                                        <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    @foreach($users as $user)
        <a href="{{$user->path()}}" >
            <div class="flex mb-4 items-center">
                <img src="{{$user->avatar}}" class="rounded-full h-12 w-12 mr-2" alt="{{$user->username}}' avatar">
                <div>
                    <h1 class="font-bold">{{'@'.$user->username}}</h1>
                </div>
            </div>
        </a>
        @endforeach
        {{$users->links()}}
</x-app>
