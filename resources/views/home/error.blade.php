@if ($errors->any())
    <div class="form-group container mt-5">
        <div class="row">
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        </div>
    </div>
@endif
