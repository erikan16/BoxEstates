@if (Session::has('success'))

    <div class="alert alert-success" role="alert">
        <strong>Success:</strong> {{ Session::get('success') }}
    </div>

@endif

@if (Session::has('successMail'))

    <div style="background: darkseagreen; padding: 20px 0; text-align: center; color: #fff;" role="alert">
        <strong>Success:</strong> {{ Session::get('successMail') }}
    </div>

@endif

@if (count($errors) > 0)

    <div class="alert alert-danger" role="alert">
        <strong>Errors:</strong>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif