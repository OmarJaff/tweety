<x-app>

    <div>
        @include('publish-tweet-panel')
        <keep-alive>

        <timeline :current-user="{{current_user()->id}}"
                  :user-likes="{{current_user()->likes}}">
        </timeline>
        </keep-alive>
    </div>

</x-app>

