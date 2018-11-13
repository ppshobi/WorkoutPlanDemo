@if (isset($errors) && count($errors) > 0)
    <div class="alert alert-icon alert-danger" role="alert">
        <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif