<x-app>

   <div class="flex bg-gray-200 w-auto rounded-lg">
       <div class="flex justify-center flex-col h-full w-full items-center">

               <form method="POST" action="{{$user->path()}}" class="w-full" enctype="multipart/form-data">
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

{{--                       <div ><label for="avatar"--}}
{{--                                 class="text-sm text-gray-600 p-1 flex">{{ __('User Avatar') }}</label>--}}
{{--                           <div class="flex w-full items-center justify-center bg-gray-200">--}}
{{--                               <label class="w-full flex items-center px-1 py-3 bg-white  rounded-md--}}
{{--                                             uppercase border border-gray-300 cursor-pointer hover:bg-gray-500 hover:text-white">--}}
{{--                                   <svg class="w-5 h-5 mx-2 " fill="currentColor" xmlns="http://www.w3.org/2000/svg"--}}
{{--                                        viewBox="0 0 20 20">--}}
{{--                                       <path--}}
{{--                                           d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z"/>--}}
{{--                                   </svg>--}}
{{--                                   <span class=" text-sm leading-normal">Upload new avatar</span>--}}
{{--                                   <input id="avatar" name="avatar" type='file' class="hidden"/>--}}
{{--                               </label>--}}
{{--                           </div>--}}
{{--                       </div>--}}

                       <label for="avatar"
                              class="text-sm text-gray-600 p-1 flex">{{ __('Avatar') }}</label>
                           <div class="col-md-6 flex">

                               <input id="avatar" type="file"
                                      class="border border-gray-300 rounded-md bg-white
                w-full text-sm px-3 py-2 placeholder-gray-500 @error('avatar') is-invalid @enderror"
                                      name="avatar" value="{{$user->avatar}}">
                               <img src="{{$user->avatar}}" alt="your avatar" class="w-20 h-10">

                               @error('avatar')
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
                                  name="password"  autocomplete="new-password">

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
                                  name="password_confirmation"   autocomplete="new-password">
                       </div>

                   </div>
                   <div class="p-4 flex w-full justify-end ">
                       <div class="flex w-1/2">
                           <button type="submit"
                                   class=" w-full px-4 bg-blue-500 rounded-md text-center  font-medium text-white p-1  hover:bg-blue-600">
                               {{ __('Save Changes') }}
                           </button>
                           <a href="{{$user->path()}}"
                              class=" w-full px-4  text-center  font-medium text-black p-1">
                               Cancle
                           </a>
                       </div>

                   </div>
               </form>

       </div>
   </div>

</x-app>
