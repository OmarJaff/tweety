<x-auth.header>

        <div class="w-auto">
            <div class="justify-center flex text-gray-600 text-lg py-3 mx-2">{{ __('Login into your account') }}</div>

            <div class="p-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <label for="email" class="sr-only">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" placeholder="Email Address"
                               type="email"
                               class="focus:outline-none
                                       focus:shadow-sm border
                                       border-gray-300
                                       rounded-t-md w-full
                                       text-sm px-3 py-2
                                       placeholder-gray-500 @error('email')  border-red-500 @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="text-xs p-2 text-red-500 font-medium flex" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>


                    <div class="form-group row">
                        <label for="password" class="sr-only">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" placeholder="Password" type="password"
                                   class="border border-gray-300
                                       rounded-b-md focus:outline-none
                                       focus:shadow-sm  w-full text-sm
                                       px-3 py-2 placeholder-gray-500 @error('password') border-red-500 @enderror"
                                   name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="text-xs p-2 text-red-500 font-medium flex" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>


                    {{--                            <div class="col-md-6 offset-md-4">--}}
                    {{--                                <div class="form-check">--}}
                    {{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

                    {{--                                    <label class="form-check-label" for="remember">--}}
                    {{--                                        {{ __('Remember Me') }}--}}
                    {{--                                    </label>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        --}}

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit"
                                    class="appearance-none relative w-full bg-blue-500 rounded-md text-center my-5 font-semibold text-white p-1  hover:bg-blue-600">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="text-gray-600 p-2" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            <div class="relative mt-4">
                                <div class="absolute inset-0 flex items-center">
                                    <div class="w-full border-t border-gray-400"></div>
                                </div>
                                <a href="{{route('register')}}">
                                    <div class="relative flex justify-center text-sm leading-5">
                                        <span class="px-2 bg-gray-100 text-gray-500">Don't have an account?</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

</x-auth.header>
