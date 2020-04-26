<h1 class="font-bold mb-4 text-xl">Friends</h1>
<ul class="px-2">
    @foreach(range(1,8) as $index)
    <li class="mb-4">
        <div class="flex items-center text-sm">
            <img src="https://i.pravatar.cc/40" alt="" class="rounded-full mr-2 ">
            Omar Jaff
        </div>
    </li>
        @endforeach
</ul>
