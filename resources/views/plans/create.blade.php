@extends('layouts.app')
@section('content')
    <div class="page-header">
        <h1 class="page-title">
            Create A plan
        </h1>
    </div>
    <div class="card">
        <div class="card-body o-auto">
            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label class="form-label">Plan Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Biceps workout plan..">
                </div>
                <div class="form-group">
                    <label class="form-label">Plan Description</label>
                    <textarea class="form-control" name="description" rows="6" placeholder="Add plan description.."></textarea>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="btn btn-primary">Add Plan</div>
        </div>
    </div>
@endsection