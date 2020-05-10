<x-app>

    <div>
        @include('publish-tweet-panel')

        <timeline :current-user="{{current_user()->id}}"
                  :user-likes="{{current_user()->likes}}">
        </timeline>
    </div>

</x-app>

