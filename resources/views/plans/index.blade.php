@extends('layouts.app')
@section('content')
    <div class="page-header">
        <h1 class="page-title">
            Plans Overview
        </h1>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Current Plans</h3>
        </div>
        <div class="card-body o-auto" style="height: 30rem">
            <ul class="list-unstyled list-separated">
                @forelse($plans as $plan)
                    <li class="list-separated-item">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="avatar avatar-md d-block" style="background-image: url('/images/user.jpg')"></span>
                            </div>
                            <div class="col">
                                <div>
                                    <a href="javascript:void(0)" class="text-inherit">{{ $plan->name }}</a>
                                </div>
                                <small class="d-block item-except text-sm text-muted h-1x">{{ $plan->description }}</small>
                            </div>
                            <div class="col">Difficulty - <span class="status-icon @if($plan->difficulty == 1) bg-success @elseif($plan->difficulty == 2) bg-warning @else bg-danger @endif"></span></div>
                            <div class="col-auto">
                                <a href="{{ "/plans/$plan->id" }}" class="btn btn-sm btn-primary">Goto plan details</a>
                            </div>
                            <div class="col-auto">
                                <div class="item-action dropdown">
                                    <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ "/plans/$plan->id" }}" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Edit Plan </a>
                                        <form action="{{ "/plans/$plan->id" }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item"><i class="dropdown-icon fe fe-trash"></i>Delete Plan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @empty
                    <li>Ooops.. No plans yet, Create one using the button</li>
                @endforelse
            </ul>
        </div>
        <div class="card-footer">
            <a class="btn btn-primary" href="/plans/create">Create a plan</a>
        </div>
    </div>
@endsection