<h1 class="font-bold mb-4 text-xl">Followings</h1>
<ul class="px-2">
    @foreach(auth()->user()->follows as $user)
    <li class="mb-4">
        <div>
            <a href="{{route('profile', $user->name)}}" class="flex items-center">
                <img src="{{$user->avatar}}" alt="" class="rounded-full mr-2 w-10 h-10 ">
                {{$user->name}}
            </a>
        </div>
    </li>
        @endforeach
</ul>
