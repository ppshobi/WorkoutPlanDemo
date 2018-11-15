@extends('layouts.app')
@section('content')
    <div class="page-header">
        <h1 class="page-title">
            {{ $title }}
        </h1>
    </div>
    <div class="card">
        <div class="col-md-12 p-2">
            @include('layouts.partials.errors')
        </div>
        <plan :plan="{{ $plan }}" inline-template>
            <div>
            <div class="card-body o-auto d-flex">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Plan Name</label>
                        <input type="text" v-model="name" @blur="updatePlan" class="form-control" name="name" placeholder="Biceps workout plan..">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Plan Description</label>
                        <textarea class="form-control" @blur="updatePlan" v-model="description" name="description" rows="6" placeholder="Add plan description.."></textarea>
                    </div>
                    <div class="form-group">
                        <div class="form-label">Plan Difficulty <small class="text-dark">(1 is least difficult 3 being most)</small></div>
                        <div class="custom-controls-stacked">
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" name="difficulty" @change="updatePlan" v-model="difficulty" value="1" :checked="difficulty == 1">
                                <span class="custom-control-label">1</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" name="difficulty" @change="updatePlan" v-model="difficulty" value="2" :checked="difficulty == 2">
                                <span class="custom-control-label">2</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" name="difficulty" @change="updatePlan" v-model="difficulty" value="3" :checked="difficulty == 3">
                                <span class="custom-control-label">3</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div v-for="day in days">
                        <day :day="day" @remove-day="removeDay"></day>
                    </div>
                    <button class="btn btn-primary w-100" @click.prevent="addDay">Add a Day</button>
                </div>
            </div>
            <div class="card-footer text-right">
                <a class="btn btn-primary" href="/plans">Save & Go Back</a>
            </div>
        </div>
        </plan>
    </div>
@endsection