<div class="flex space-x-4 items-center">


                <like-buttons :tweets="{{$tweet}}"></like-buttons>

{{--                <span class="text-xs text-gray-600">{{$tweet->likes ?: 0}}</span>--}}

{{--                    <span class="text-xs text-gray-600">{{$tweet->dislikes ?: 0}}</span>--}}
{{--    <form action="/tweets/{{$tweet->id}}/like" method="POST">--}}
{{--        @csrf--}}
{{--        @method('DELETE')--}}
{{--        <div--}}
{{--            class="flex items-center">--}}
{{--            <button type="submit" class=" text-xs text-gray-600 flex outline-none focus:outline-none">--}}
{{--                <svg class="fill-current {{$tweet->isDislikedBy(current_user()) ? 'text-red-400' : 'text-gray-500'}}  w-4 mr-1 mt-2" viewBox="0 0 20 20">--}}
{{--                    <g class="fill-current">--}}
{{--                        <g id="icon-shape">--}}
{{--                            <path--}}
{{--                                d="M11.0010436,20 C9.89589787,20 9.00000024,19.1132936 9.0000002,18.0018986 L9,12 L1.9973917,12 C0.894262725,12 0,11.1122704 0,10 L0,8 L2.29663334,1.87564456 C2.68509206,0.839754676 3.90195042,8.52651283e-14 5.00853025,8.52651283e-14 L12.9914698,8.52651283e-14 C14.1007504,8.52651283e-14 15,0.88743329 15,1.99961498 L15,10 L12,17 L12,20 L11.0010436,20 L11.0010436,20 Z M17,10 L20,10 L20,0 L17,0 L17,10 L17,10 Z"--}}
{{--                                id="Fill-97"></path>--}}
{{--                        </g>--}}
{{--                    </g>--}}
{{--                </svg>--}}
{{--            </button>--}}

{{--        </div>--}}
{{--    </form>--}}
</div>
