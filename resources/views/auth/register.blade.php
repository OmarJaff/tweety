<x-master>
<div class="bg-gray-200 w-screen h-screen" >
    <div class="flex justify-center flex-col h-full w-auto items-center">

        <div class=" max-w-md w-full">
            <div class="flex justify-center">

                <h1>
                    <img src="/images/logo.svg" alt="Tweety logo">
                </h1>

            </div>
            <div class="w-auto">
                <div class="justify-center flex text-gray-600 text-sm py-3 mx-2" >{{ __('Register a new account and have fun!') }}</div>

                <div class="p-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf


                        <label for="name" class="sr-only">{{ __('Name') }}</label>
                        <div class="p-1 space-y-2" >
                            <div class="w-full">
                                <input id="name" type="text" placeholder="Name"
                                       class="border border-gray-300 rounded-t-md w-full text-sm px-3 py-2 placeholder-gray-500 @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <label for="email"
                                   class="sr-only col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" placeholder="Email Address" type="email"
                                       class="border border-gray-300 border-t-0   w-full text-sm px-3 py-2 placeholder-gray-500 @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <label for="password"
                                   class="sr-only col-form-label text-md-right">{{ __('Password') }}</label>


                            <input id="password" placeholder="Password" type="password"
                                   class="border border-gray-300 border-t-0 w-full text-sm px-3 py-2 placeholder-gray-500 @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror


                            <label for="password-confirm"
                                   class="sr-only  col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" placeholder="Confirm Password" type="password"
                                       class="border border-gray-300 rounded-b-md border-t-0 w-full text-sm px-3 py-2 placeholder-gray-500"
                                       name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                            <button type="submit" class=" w-full bg-blue-500 rounded-md text-center my-5 font-semibold text-white p-1  hover:bg-blue-600">
                                {{ __('Register') }}
                            </button>

                </form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-master>
