<x-master>
    <section class="px-8 py-4 mb-6">
        <header class="container mx-auto flex justify-between">
            <h1>
                <img src="/images/logo.svg" alt="Tweety logo">
            </h1>

        </header>
    </section>
    <section class="px-8">
        <main class="container mx-auto">
            <div class="lg:flex lg:justify-between">

                @if(auth()->check())
                <div class="lg:w-32">@include('sidebar-links')</div>
                @endif


                <div class="lg:flex-1 lg:mx-10" style="max-width: 700px">
                    {{ $slot }}
                </div>

                  @if(auth()->check())
                         @include('friends-list')
                    @endif
            </div>
        </main>
    </section>

</x-master>
