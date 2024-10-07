@extends('layouts.app')

@section('title', 'Create Firm')

@section('content')
<div class="login-register-container">
    <div class="login-register-card">
        <div class="card-body d-flex">
            <div class="col-md-6 bg-green text-white p-4 d-flex flex-column justify-content-center">
                <h2 class="mb-4">Welcome to WOM Invest</h2>
                <p class="mb-4">Create your firm profile to start investing.</p>
            </div>
            <div class="col-md-6 p-4">
                <h3 class="mb-4">Create Firm</h3>
                <form method="POST" action="{{ route('firms.store', $user->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="firm_name">Firm Name:</label>
                        <input type="text" class="form-control" id="firm_name" name="firm_name" required>
                    </div>

                    <div class="form-group">
                        <label for="firm_email">Firm Email:</label>
                        <input type="email" class="form-control" id="firm_email" name="firm_email" required>
                    </div>

                    <div class="form-group">
                        <label for="default_password">Default Password:</label>
                        <input type="password" class="form-control" id="default_password" name="default_password" required>
                    </div>

                    <div class="form-group">
                        <label for="document1">Document 1:</label>
                        <input type="file" class="form-control" id="document1" name="document1" required>
                    </div>

                    <div class="form-group">
                        <label for="document2">Document 2:</label>
                        <input type="file" class="form-control" id="document2" name="document2" required>
                    </div>

                    <button type="submit" class="btn btn-green btn-block">Create Firm</button>
                </form>
                
                @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection