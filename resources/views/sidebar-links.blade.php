<ul>
    <li class="font-bold text-lg mb-4 block"><a href="{{route('home')}}">Home</a></li>
    <li class="font-bold text-lg mb-4 block"><a href="/explore">Explore</a></li>
    <li class="font-bold text-lg mb-4 block"><a href="#">Notifications</a></li>
    <li class="font-bold text-lg mb-4 block"><a href="#">Messages</a></li>
    <li class="font-bold text-lg mb-4 block"><a href="#">Bookmarks</a></li>
    <li class="font-bold text-lg mb-4 block"><a href="{{auth()->user()->path()}}">Profile</a></li>
    <li class="font-bold text-lg mb-4 block"><a href="#">Lists</a></li>
</ul>
