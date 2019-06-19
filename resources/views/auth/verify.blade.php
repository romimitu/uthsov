@extends('frontend.layouts.layout')

@section('content')

<section class="padding-small">
  <div class="container">
    <div class="row">
      <div class="col align-self-center">
        <div class="block">
          <div class="block-header">
            <h5>{{ __('Verify Your Email Address') }}</h5>
          </div>
          <div class="block-body">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}"><u>{{ __('click here to request another') }}</u></a>.
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
