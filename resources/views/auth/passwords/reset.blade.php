<x-auth.header>

            <div class="card">
                <div class="justify-center flex text-gray-600 text-lg py-3 mx-2">{{ __('Reset Your Password') }}</div>

                <div class="p-4">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="p-1 space-y-2">
                            <label for="email" class="sr-only">{{ __('E-Mail Address') }}</label>
                            <div class="w-full">
                                <input id="email" placeholder="E-Mail Address"
                                       type="email"
                                       class="focus:outline-none
                                       focus:shadow-sm border
                                       border-gray-300
                                       rounded-t-md w-full
                                       text-sm px-3 py-2 placeholder-gray-500 @error('email')  border-red-500 @enderror"
                                         name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="text-xs p-2 text-red-500 font-medium" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                            <label for="password" class="sr-only">{{ __('Password') }}</label>

                            <div class="w-full">
                                <input placeholder="password"
                                       id="password"
                                       type="password"
                                       class="
                                       focus:outline-none
                                       focus:shadow-sm border
                                       border-gray-300
                                       border-t-0
                                        w-full
                                       text-sm px-3 py-2 placeholder-gray-500 @error('email')
                                       border-red-500 @enderror"
                                        name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="text-xs p-2 text-red-500 font-medium" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="password-confirm" class="sr-only">{{ __('Confirm Password') }}</label>

                            <div class="w-full">
                                <input placeholder="Confirm Password"
                                       id="password-confirm"
                                       type="password"
                                       name="password_confirmation"
                                       class="focus:outline-none
                                       focus:shadow-sm border
                                       rounded-b-md
                                       border-t-0
                                       border-gray-300
                                       md
                                       w-full
                                       text-sm px-3 py-2 placeholder-gray-500 @error('email')  border-red-500 @enderror"
                                       required autocomplete="new-password">
                            </div>


                            <div class="mt-2">
                                <button type="submit"
                                        class=" appearance-none relative w-full bg-blue-500 rounded-md text-center my-5 font-semibold text-white p-1  hover:bg-blue-600">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

    </x-auth.header>
