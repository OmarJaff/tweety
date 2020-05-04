<x-app>

<div>
    @include('publish-tweet-panel')
{{--    @include('timeline')--}}

    <timeline :current-user="{{current_user()}}" ></timeline>

</div>

</x-app>

