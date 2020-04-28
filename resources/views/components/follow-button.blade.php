
@unless(current_user()->is($user))
<form method="post" action="/profiles/{{ $user->id }}}/follow">
    @csrf
    <button type="submit" class="bg-blue-500 shadow px-4 py-2 rounded-full text-white text-xs">
        {{current_user()->following($user->id) ? 'Unfollow' : 'follow'}}
    </button>
</form>
@endunless
