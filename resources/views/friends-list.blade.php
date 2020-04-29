<h1 class="font-bold mb-4 text-xl">Followings</h1>
<ul class="px-2">
    @forelse(auth()->user()->follows as $user)
    <li class="mb-4">
        <div>
            <a href="{{$user->path()}}" class="flex items-center">
                <img src="{{$user->avatar}}" alt="" class="rounded-full mr-2 w-10 h-10 ">
                {{$user->name}}
            </a>
        </div>
    </li>
        @empty
        <li class="mb-4">No friends Yet!</li>
    @endforelse
</ul>
