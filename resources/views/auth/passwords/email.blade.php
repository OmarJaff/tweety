<x-auth.header>
                <div class="card">
                    <div class="justify-center flex text-gray-600 text-sm py-3 mx-2" >{{ __('Reset your password') }}</div>

                    <div class="p-4">

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="p-1">
                                <label for="email"
                                       class="sr-only">{{ __('E-Mail Address') }}</label>

                                <div class="w-full">
                                    <input id="email" type="email"
                                           placeholder="Your email address"
                                           class="focus:outline-none
                                       focus:shadow-sm border
                                       border-gray-300
                                       rounded-md w-full
                                       text-sm px-3 py-2 placeholder-gray-500 @error('email')  border-red-500 @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="text-xs p-2 text-red-500 font-medium" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            @if (session('status'))
                                <div class="relative mt-4">
                                    <div class="absolute inset-0 flex items-center">
                                        <div class="w-full border-t border-green-400"></div>
                                    </div>

                                    <div class="relative flex justify-center text-sm leading-5">
                                        <span class="px-2 bg-gray-200 text-green-500 font-medium">{{ session('status') }}</span>
                                    </div>
                                </div>
                            @endif

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit"
                                            class="appearance-none relative w-full bg-blue-500 rounded-md text-center my-5 font-semibold text-white p-1  hover:bg-blue-600">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
    </x-auth.header>
