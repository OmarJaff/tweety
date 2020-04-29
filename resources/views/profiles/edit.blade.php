<x-app>

   <div class="flex bg-gray-200 w-auto rounded-lg">
       <div class="flex justify-center flex-col h-full w-full items-center">

               <form method="POST" action="{{$user->path()}}" class="w-full">
                   @csrf
                   @method('PATCH')

                   <div class="p-4 space-y-4 ">
                       <div class="w-full">

                           <div><label for="name" class="text-sm text-gray-600 p-1 flex ">{{ __('Name') }}</label>
                               <input id="name" type="text"
                                      class="border border-gray-300 rounded-md w-full text-sm px-3 py-2 placeholder-gray-500 @error('name') is-invalid @enderror"
                                      name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                               @error('name')
                               <span class="text-xs p-2 text-red-500 font-medium flex" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror</div>
                       </div>


                       <div class="col-md-6">
                           <label for="username"
                                  class="text-sm text-gray-600 p-1 flex">{{ __('User Name') }}</label>
                           <input id="username" type="text"
                                  class="border border-gray-300 rounded-md   w-full text-sm px-3 py-2 placeholder-gray-500 @error('username') is-invalid @enderror"
                                  name="username" value="{{ $user->username }}" required autocomplete="username">

                           @error('username')
                           <span class="text-xs p-2 text-red-500 font-medium flex" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                           @enderror
                       </div>


                       <div class="col-md-6">
                           <label for="email"
                                  class="text-sm text-gray-600 p-1 flex">{{ __('E-Mail Address') }}</label>
                           <input id="email" type="email"
                                  class="border border-gray-300 rounded-md   w-full text-sm px-3 py-2 placeholder-gray-500 @error('email') is-invalid @enderror"
                                  name="email" value="{{  $user->email }}" required autocomplete="email">

                           @error('email')
                           <span class="text-xs p-2 text-red-500 font-medium flex" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                           @enderror
                       </div>


                       <div><label for="password"
                                 class="text-sm text-gray-600 p-1 flex">{{ __('Password') }}</label>
                           <input id="password" type="password"
                                  class="border border-gray-300 rounded-md w-full text-sm px-3 py-2 placeholder-gray-500 @error('password') is-invalid @enderror"
                                  name="password" required autocomplete="new-password">

                           @error('password')
                           <span class="text-xs p-2 text-red-500 font-medium flex" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                           @enderror</div>




                       <div class="col-md-6">
                           <label for="password-confirm"
                                  class="text-sm text-gray-600 p-1 flex">{{ __('Confirm Password') }}</label>
                           <input id="password-confirm" type="password"
                                  class="border border-gray-300 rounded-md w-full text-sm px-3 py-2 placeholder-gray-500"
                                  name="password_confirmation" required autocomplete="new-password">
                       </div>

                   </div>
                   <div class="p-4 flex w-full justify-end">
                       <div class="flex w-1/3">
                           <button type="submit"
                                   class=" w-full px-4 bg-blue-500 rounded-md text-center  font-medium text-white p-1  hover:bg-blue-600">
                               {{ __('Save Changes') }}
                           </button>
                       </div>
                   </div>
               </form>

       </div>
   </div>

</x-app>
