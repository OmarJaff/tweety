<x-app>

@section('content')

    <header class=" relative mb-8">
        <div class="rounded-lg flex h-48 ">
            <img class="fill-current rounded-lg object-cover mb-2" src="/images/coverphoto.jpg" alt="cover photo">
        </div>
        <div class="flex  justify-between items-center">
            <div class="">
                <h2 class="font-bold text-2xl">{{$user->name}}</h2>
                <p class="text-sm">Joined {{$user->created_at->diffForHumans()}}</p>
            </div>
            <div class="space-x-2">
                <a href=""  class="border border-gray-200 px-4 py-2 rounded-full text-black text-xs ">Edit Profile</a>
                <a href=""  class="bg-blue-500 shadow px-4 py-2 rounded-full text-white text-xs" >Follow me</a>
            </div>
        </div>

        <p class="text-xs p-2 my-4  items-center text-center text-justify text-gray-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti dignissimos, distinctio dolores enim explicabo id iusto natus non officia officiis omnis placeat possimus quidem quod suscipit tempore veniam veritatis voluptas</p>
        <img src="{{$user->avatar}}" alt="" class="rounded-full w-32
         bottom-0
         border-2
         border-white
         absolute transform
         -translate-x-1/2
         -translate-y-20" style="left: 50%">
    </header>

    @include('timeline', [

    'tweets' => $user->tweets

    ])
</x-app>
