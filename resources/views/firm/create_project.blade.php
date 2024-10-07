@extends('layouts.app')

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('content')
<div class="container">
    <h2>Create New Project</h2>
    <form action="{{ route('firm.store_project') }}" method="POST" class="project-form">
        @csrf
        <div class="form-group">
            <label for="title">Project Title:</label>
            <input type="text" name="title" required class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" required class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="target_amount">Target Amount:</label>
            <input type="number" name="target_amount" min="0" step="0.01" required class="form-control">
        </div>
        <button type="submit" class="btn">Create Project</button>
    </form>
</div>

<style>
    body {
        background-color: #f0f8ff;
        font-family: Arial, sans-serif;
    }

    .container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #333;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        color: #555;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        transition: border-color 0.3s;
    }

    .form-control:focus {
        border-color: #007bff;
        outline: none;
    }

    .btn {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: green;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #0056b3;
    }
</style>
@endsection