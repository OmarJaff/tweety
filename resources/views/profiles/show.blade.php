<x-app>

    @section('content')



        <profile :user="{{$user}}"
                 :editable="{{$user->canEdit($user) ? 'true' : 'false'}}"
                 :is-current-user="{{current_user()->is($user) ? 'true' : 'false'}}"
        >
            @can ('edit' , $user)
                <a href="{{$user->path('edit')}}"
                   class="border border-gray-200 px-4 py-2 rounded-full text-black text-xs ">Edit Profile</a>
            @endcan


        </profile>

        <timeline :user="{{$user}}"></timeline>
{{--        @include('timeline', [--}}

{{--        'tweets' => $tweets--}}

{{--        ])--}}
</x-app>
