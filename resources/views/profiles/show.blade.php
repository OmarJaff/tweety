<x-app>

@section('content')

    <header class=" relative mb-8">
        <div class="rounded-lg flex h-48 relative ">

                <img class="fill-current rounded-lg object-cover mb-2" src="/images/coverphoto.jpg" alt="cover photo">
                <img src="{{$user->avatar}}" alt="" class="rounded-full w-32
         bottom-0
         border-2
         border-white
         absolute transform
         -translate-x-1/2
         translate-y-1/2" style="left: 50%"></div>

        <div class="flex  justify-between items-center">
            <div class="">
                <h2 class="font-bold text-2xl">{{$user->name}}</h2>
                <p class="text-sm">Joined {{$user->created_at->diffForHumans()}}</p>
            </div>
            <div class="space-x-2 flex">
                @can ('edit' , $user)
                <a href="{{route('edit-profile', $user->name)}}"  class="border border-gray-200 px-4 py-2 rounded-full text-black text-xs ">Edit Profile</a>
                @endcan
                <x-follow-button :user="$user">

                </x-follow-button>

            </div>
        </div>

        <p class="text-xs p-2 my-4  items-center text-center text-justify text-gray-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti dignissimos, distinctio dolores enim explicabo id iusto natus non officia officiis omnis placeat possimus quidem quod suscipit tempore veniam veritatis voluptas</p>

    </header>

    @include('timeline', [

    'tweets' => $user->tweets

    ])
</x-app>
