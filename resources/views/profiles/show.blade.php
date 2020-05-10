<x-app>

        <profile :user="{{$user}}"
                 :editable="{{$user->canEdit($user) ? 'true' : 'false'}}"
                 :is-current-user="{{current_user()->is($user) ? 'true' : 'false'}}"
        >
            @can ('edit' , $user)
                <a href="{{$user->path('edit')}}"
                   class="border border-gray-200 px-4 py-2 rounded-full text-black text-xs ">Edit Profile</a>
            @endcan

            @unless (current_user()->is($user))
                <form action="{{route('follow', $user)}}" method="POST"  >
                    @csrf
                    <button type="submit"
                            class="hover:bg-blue-600 focus:outline-none outline-none bg-blue-500 shadow px-4 py-2 rounded-full text-white text-xs">
                        {{current_user()->following($user) ? 'unfollow' : 'follow me' }}
                    </button>
                </form>
            @endif
        </profile>

        <timeline :user-likes="{{current_user()->likes}}"
                  :user="{{$user}}"
                  :current-user="{{current_user()->id}}"
        ></timeline>

         @if(Session::has('follow'))
            <follow-alert>
                {{Session::get('follow')}}
            </follow-alert>
        @endif

</x-app>




