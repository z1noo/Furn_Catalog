@extends('layouts.app')

@section('content')
<div class="container-w-screen h-screen">
    <div class="min-h-screen m-0 flex">
        <img src="{{ asset ('image/BackgroundLogin.jpg') }}" class="w-fit h-screen object-cover ">
        <div class="w-screen h-screen">
            <div class="ml-40 mt-10 mr-18 h-fit">
                <div class="text-h2lr mb-0 h-16">{{ __('Verify Your Email Address') }}</div>

                <div class="flex-col">
                    @if (session('resent'))
                        <div class="font-light" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                </div>
                <div class="text-twell">
                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                </div>

                <form class="w-[450px] h-[400px]" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <div class="flex-col text-butlog mt-4">
                        <button type="submit" class="butlog bg-[#FFC93E] rounded-[12px] w-[250px] h-[36px]">{{ __('click here to request another') }}</button>.
                    </div>
                </form>

                <div class="flex-col h-fit w-fit mr-52 ml-52">
                    <span class="">© Copyright 2024 <span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
