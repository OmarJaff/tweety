<x-app>

@section('content')

    <header class=" relative mb-8">
        <div class="rounded-lg flex h-48 relative ">

                <img class="w-full fill-current rounded-lg object-cover mb-2" src="/images/coverphoto.jpg" alt="cover photo">

                <img src="{{$user->avatar}}" alt="" class="rounded-full w-32
         bottom-0
         border-2
         border-white
         absolute transform
         -translate-x-1/2

         translate-y-1/2" style="left: 50%"></div>
            <span class=" flex justify-center -translate-x-1/2 -translate-y-16 bg-transparent absolute hover:bg-black hover:opacity-25 h-32 opacity-0 rounded-full transform w-32 border-2" style="left:50%; border-top: 100px solid transparent;">
 <svg class="w-10 h-10  transform -translate-y-8 " width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M3 9C3 7.89543 3.89543 7 5 7H5.92963C6.59834 7 7.2228 6.6658 7.59373 6.1094L8.40627 4.8906C8.7772 4.3342 9.40166 4 10.0704 4H13.9296C14.5983 4 15.2228 4.3342 15.5937 4.8906L16.4063 6.1094C16.7772 6.6658 17.4017 7 18.0704 7H19C20.1046 7 21 7.89543 21 9V18C21 19.1046 20.1046 20 19 20H5C3.89543 20 3 19.1046 3 18V9Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M15 13C15 14.6569 13.6569 16 12 16C10.3431 16 9 14.6569 9 13C9 11.3431 10.3431 10 12 10C13.6569 10 15 11.3431 15 13Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>



            </span>

        <div class="flex  justify-between items-center">
            <div class="">
                <h2 class="font-bold text-2xl">{{$user->name}}</h2>
                <p class="text-sm">Joined {{$user->created_at->diffForHumans()}}</p>
            </div>
            <div class="space-x-2 flex">
                @can ('edit' , $user)
                <a href="{{$user->path('edit')}}"  class="border border-gray-200 px-4 py-2 rounded-full text-black text-xs ">Edit Profile</a>
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
