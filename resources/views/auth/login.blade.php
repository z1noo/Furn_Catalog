@extends('layouts.app')

@section('content')
            <div class="min-h-screen m-0 flex ">
                    <img src="{{ asset ('image/BackgroundLogin.jpg') }}" class="w-fit h-screen object-cover ">  
                <div class="w-screen h-screen">
                    <div class="ml-40 mt-10  mr-18 h-fit ">
                        <span class="text-twell">Hi there! Wellcome back</span>
                        <h2 class="text-h2lr mb-8 ">{{ __('Login') }}</h2>
                        <!-- <span class="title-icon">.Fur<span class="text-[#FFC93E]">niture</span></span> -->
                    <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="flex-col text-uspas">
                                <label for="email" >{{ __('Email Address') }}</label>

                                <div class="flex-col mb-2">
                                    <input id="email" type="email" class="bg-[#D9D9D9] rounded-md w-[472px] h-[34px] p-4" name="email" value="{{ @old('email') }}" required autocomplete="off" >
                                </div>
                                <div class="flex-col mt-1">
                                    @error('email')
                                        <span class="text-[#ff5e5e]" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>    
                            </div>

                            <div class="flex-col text-uspas mt-6">
                                <label for="password">{{ __('Password') }}</label>

                                <div class="flex-col mb-2">
                                    <input id="password" type="password" class="bg-[#D9D9D9] rounded-md w-[472px] h-[34px] p-4" name="password" required autocomplete="off">
                                </div>
                                <div class="flex-col mb-1">
                                    @error('password')
                                        <span class="text-[#ff5e5e]" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> 
                            </div>
                            <div class="flex justify-stretch gap-20 w-[480px] ">
                                <div class="flex-1 mb-2 w-36  ">
                                    <input type="checkbox" name="remember" id="remember" value="{{ @old('remember') ? 'checked' : '' }}">

                                    <label class="" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <div class="flex-1">
                                        @if (Route::has('password.request'))
                                                <a class="" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password ?') }}
                                                </a>
                                        @endif
                                    </div>  
                            </div>
                            <div class="flex-col mt-16 mb-2 text-acc">
                                <span class="">Don't have an account ? <a class="no-underline text-[#FFC93E] " href="register">Create here</a></span>
                            </div>
                            
                                <div class="flex-col text-butlog mb-8">
                                    <button type="submit" class="butlog bg-[#FFC93E] rounded-[12px] w-[120px] h-[36px]">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                    </form>
                        <div class="flex-col h-fit w-fit mr-52 ml-52">
                            <span class="">© Copyright 2024 <span>
                        </div>
                    </div>    
                </div>    
            </div>

@endsection
