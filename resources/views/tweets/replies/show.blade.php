<x-app>

    <tweet-with-replies   :user-likes="{{current_user()->likes}}"
                          tweet-id="{{$tweet}}"
                          :current-user="{{current_user()->id}}"
    ></tweet-with-replies>

</x-app>
