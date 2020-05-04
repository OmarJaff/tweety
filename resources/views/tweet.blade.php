<div class="flex p-4 {{$loop->last ? '' : 'border-b border-gray-300'}}">
    <div class="mr-2  flex-shrink-0">
        <a href="{{route('profile', $tweet->user->username )}}">
            <img src="{{$tweet->user->avatar}}"
                 alt=""
                 class="rounded-full mr-2 w-12 h-12"></a>
    </div>

    <div class="space-y-2">
        <a href="{{route('profile', $tweet->user->username)}}"><h5 class="font-bold ">{{$tweet->user->name}}</h5></a>
        <p class="text-sm ">{{$tweet->body}}</p>

         <div class="flex">


            <livewire:like-button />
            <span>{{$tweet->likes}}</span>
            <livewire:dislike-button />



        </div>
    </div>
</div>
