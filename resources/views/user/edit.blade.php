@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit - {{ $user->first_name }}</div>

                    <div class="card-body">
                        <form method="POST" action="/users/{{$user->id}}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group row d-flex">
                                <label for="name" class="col-md-3 col-form-label">First Name</label>

                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="first_name" value="{{ $user->first_name }}" required autofocus>

                                    @if ($errors->has('first_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row d-flex">
                                <label for="last_name" class="col-md-3 col-form-label">Last Name</label>

                                <div class="col-md-8">
                                    <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ $user->last_name }}" required autofocus>

                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row d-flex">
                                <label for="email" class="col-md-3 col-form-label">Plan</label>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <select name="plan_id" id="select-beast" class="form-control custom-select">
                                            @foreach($plans as $plan)
                                                <option value="{{ $plan->id }}" {{$user->plan_id == $plan->id ? "selected" : ''}}>{{ $plan->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary">
                                        Update Member
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#select-beast').selectize({});
    </script>
@endsection
