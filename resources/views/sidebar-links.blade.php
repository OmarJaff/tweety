<ul>
    <li class="font-bold text-lg mb-4 block"><a href="{{route('home')}}">Home</a></li>
    <li class="font-bold text-lg mb-4 block"><a href="/explore">Explore</a></li>
    <li class="font-bold text-lg mb-4 block"><a href="#">Notifications</a></li>
    <li class="font-bold text-lg mb-4 block"><a href="{{auth()->user()->path()}}">Profile</a></li>
    <li class="font-bold text-lg mb-4 block"><span>                <form id="frm-logout" action="{{ route('logout') }}"
                                                                         method="POST">
                    @csrf
                    <button class="font-bold text-lg mb-4 outline-none focus:outline-none" type="submit">Log Out</button>
                </form></span></li>
</ul>
