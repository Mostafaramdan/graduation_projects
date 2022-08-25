@extends('website.layout')
@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
    </nav>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-9 shadow-lg p-3 mb-5 bg-body rounded m-3">
            <div class="text-center">
                @if(session('success'))
                    <div class="alert alert-success col-sm-6 text-center" role="alert">
                        {!! session('success') !!}
                    </div>
                @endif
            </div>
            <form id="reserPassword" class="m-5"  method="POST" action="{{route('reserPassword')}}" role="form" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">password</label>
                    <input  type="password" placeholder="password" class="form-control" id="exampleInputEmail1" name="password">
                </div>
                @error('password')
                <span class="text-danger error-messages">
                    {{$message}}
                </span>
                @enderror

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Re-type password</label>
                    <input  type="password" placeholder="password_confirmation" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
                @error('password')
                <span class="text-danger error-messages">
                    {{$message}}
                </span>
                @enderror
               
                <button type="submit" id ="submit" class="btn btn-primary mt-4 ">
                    
                    <div class="spinner-border  d-none" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    submit 
                </button>
            </form>

        </div>
    </div>
</div>

@endsection