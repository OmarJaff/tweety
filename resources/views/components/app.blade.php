<x-master>
    <section class="px-8 py-4 mb-6">
        <header class="container mx-auto flex justify-between">
            <h1 class="fixed">
                <img src="/images/logo.svg" alt="Tweety logo">
            </h1>

        </header>
    </section>
    <section class="px-8 py-3">
        <main class="container mx-auto">
            <div class="lg:flex lg:justify-between">

                @if(auth()->check())
                <div class="lg:w-32">@include('sidebar-links')</div>
                @endif


                <div class="lg:flex-1 lg:mx-10" style="max-width: 700px">
                    {{ $slot }}
                </div>

                  @if(auth()->check())
                      <div class="lg:w-1/5  justify-center  h-full   hidden md:block">
                          @include('friends-list')
                      </div>

                    @endif
            </div>
        </main>
    </section>

</x-master>
