@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div  class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('You are logged in!') }}</label>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style>


</style>
