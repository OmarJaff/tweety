<x-app>

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
