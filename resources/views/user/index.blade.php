@extends('layouts.app')
@section('content')
    <div class="page-header">
        <h1 class="page-title">
            Users
        </h1>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Gym Members</h3>
        </div>
        <div class="card-body o-auto" style="height: 30rem">
            <ul class="list-unstyled list-separated">
                @forelse($users as $user)
                    <li class="list-separated-item">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="avatar avatar-md d-block" style="background-image: url('/images/user.jpg')"></span>
                            </div>
                            <div class="col">
                                <div>
                                    <a href="javascript:void(0)" class="text-inherit">{{ $user->first_name . ' ' .  $user->last_name }}</a>
                                </div>
                                <small class="d-block item-except text-sm text-muted h-1x">{{ $user->email }}</small>
                            </div>
                            <div class="col">{{ $user->plan ? $user->plan->name : "Not enrolled in any plan" }}</div>
                            <div class="col-auto">
                                <a href="{{ "/users/$user->id/edit" }}" class="btn btn-sm btn-secondary">Assign a plan</a>
                            </div>
                            <div class="col-auto">
                                <div class="item-action dropdown">
                                    <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-edit"></i> Edit User </a>
                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-trash"></i> Delete User </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @empty
                    <li>Ooops.. Users yet, Create one using the button</li>
                @endforelse
            </ul>
        </div>
        <div class="card-footer">
            {{ $users->links() }}
        </div>
        <div class="card-footer">
            <a class="btn btn-primary" href="/users/create">Create a user</a>
        </div>
    </div>
@endsection