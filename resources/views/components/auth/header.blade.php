<x-master>

    <div class="bg-gray-100 w-screen h-screen">
        <div class="flex justify-center flex-col h-full w-auto items-center">
            <div class="max-w-md w-full">
                <div class="flex justify-center">

                    <h1>
                        <img src="/images/logo.svg" alt="Tweety logo">
                    </h1>

                </div>
                {{$slot}}
            </div>
        </div>
    </div>

</x-master>
