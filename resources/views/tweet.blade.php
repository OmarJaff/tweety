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

        <div
            class="flex items-center space-x-4 {{$tweet->isLikedBy(current_user()) ? 'text-blue-500' : 'text-gray-500'}}">
            <div class="flex items-center">
                <svg class="fill-current   mr-1 w-4" viewBox="0 0 20 20" version="1.1"
                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g class="fill-current" id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="icon-shape">
                            <path
                                d="M11.0010436,0 C9.89589787,0 9.00000024,0.886706352 9.0000002,1.99810135 L9,8 L1.9973917,8 C0.894262725,8 0,8.88772964 0,10 L0,12 L2.29663334,18.1243554 C2.68509206,19.1602453 3.90195042,20 5.00853025,20 L12.9914698,20 C14.1007504,20 15,19.1125667 15,18.000385 L15,10 L12,3 L12,0 L11.0010436,0 L11.0010436,0 Z M17,10 L20,10 L20,20 L17,20 L17,10 L17,10 Z"
                                id="Fill-97"></path>
                        </g>
                    </g>
                </svg>
                <span class="text-xs text-gray-600">{{$tweet->likes ?: 0}}</span>
            </div>
            <div class="flex items-center {{$tweet->isDislikedBy(current_user()) ? 'text-blue-500' : 'text-gray-500'}}">
                <svg class="fill-current   w-4 mr-1 mt-2" viewBox="0 0 20 20">
                    <g class="fill-current">
                        <g id="icon-shape">
                            <path
                                d="M11.0010436,20 C9.89589787,20 9.00000024,19.1132936 9.0000002,18.0018986 L9,12 L1.9973917,12 C0.894262725,12 0,11.1122704 0,10 L0,8 L2.29663334,1.87564456 C2.68509206,0.839754676 3.90195042,8.52651283e-14 5.00853025,8.52651283e-14 L12.9914698,8.52651283e-14 C14.1007504,8.52651283e-14 15,0.88743329 15,1.99961498 L15,10 L12,17 L12,20 L11.0010436,20 L11.0010436,20 Z M17,10 L20,10 L20,0 L17,0 L17,10 L17,10 Z"
                                id="Fill-97"></path>
                        </g>
                    </g>
                </svg>
                <span class="text-xs text-gray-600">{{$tweet->dislikes ?: 0}}</span>
            </div>
        </div>
    </div>
</div>
