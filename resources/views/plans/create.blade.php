@extends('layouts.app')
@section('content')
    <div class="page-header">
        <h1 class="page-title">
            Create A plan
        </h1>
    </div>
    <div class="card">
        <div class="col-md-12 p-2">
            @include('layouts.partials.errors')
        </div>
        <add-plan :plan="{{ $plan }}" inline-template @removeDay="removeDay()">

        <form action="/plans" method="post">
            @csrf
            <div class="card-body o-auto d-flex">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Plan Name</label>
                        <input type="text" :value="plan.name" class="form-control" name="name" placeholder="Biceps workout plan..">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Plan Description</label>
                        <textarea class="form-control" name="description" rows="6" placeholder="Add plan description.."></textarea>
                    </div>
                    <div class="form-group">
                        <div class="form-label">Plan Difficulty <small class="text-dark">(1 is least difficult 3 being most)</small></div>
                        <div class="custom-controls-stacked">
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" name="difficulty" value="1" checked>
                                <span class="custom-control-label">1</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" name="difficulty" value="2">
                                <span class="custom-control-label">2</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" name="difficulty" value="3">
                                <span class="custom-control-label">3</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div v-for="day in days">
                        <day :day="day"></day>
                    </div>
                    <button class="btn btn-primary w-100" @click.prevent="addDay">Add a Day</button>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Add Plan</button>
            </div>
        </form>
        </add-plan>
    </div>
@endsection