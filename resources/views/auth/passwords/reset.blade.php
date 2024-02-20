@extends('layouts.app')

@section('content')
<div class="container-w-screen h-screen">
    <div class="min-h-screen m-0 flex">
        <img src="{{ asset ('image/BackgroundLogin.jpg') }}" class="w-fit h-screen  object-cover ">
    <div class="w-screen h-screen">
            <div class="ml-40 mt-10 mr-18 h-fit">
                <div class="text-h2lr mb-0 h-16">{{ __('Reset Password') }}</div>

                    <form class="w-[400px] h-[380px] mt-20 " method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="flex-col text-uspas mb-6">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="flex-col mt-2">
                                <input id="email" type="email" class="bg-[#D9D9D9] rounded-md w-[472px] h-[34px] p-4" name="email" value="{{ $email ?? @old('email') }}" required autocomplete="off" autofocus>
                            </div>
                            <div class="flex-col">
                                @error('email')
                                    <span class="text-[#ff5e5e] font-light" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex-col text-uspas mb-2">
                            <label for="password" class="">{{ __('Password') }}</label>

                            <div class="flex-col mt-2">
                                <input id="password" type="password" class="bg-[#D9D9D9] rounded-md w-[472px] h-[34px] p-4" name="password" required autocomplete="off">
                            </div>
                            <div class="flex-col">
                                @error('password')
                                    <span class="text-[#ff5e5e] font-light" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex-col text-uspas mb-2">
                            <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>

                            <div class="flex-col mt-2">
                                <input id="password-confirm" type="password" class="bg-[#D9D9D9] rounded-md w-[472px] h-[34px] p-4" name="password_confirmation" required autocomplete="off">
                            </div>
                        </div>
                            <div class="flex-col text-butlog">
                                <button type="submit" class="butlog bg-[#FFC93E] rounded-[12px] w-[150px] h-[36px]">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                    </form>
                    <div class="flex-col h-fit w-fit mr-52 ml-52">
                        <span class="">© Copyright 2024 <span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
