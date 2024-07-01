@extends('menuTemplate')

@section('content')
<div class="container mb-5">
    <h1 class="my-4">Create New Project</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('projects.store', request()->route()->parameter('User_Id')) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="7" required>{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="technologies">Technologies</label>
            <input type="text" class="form-control" id="technologies" name="technologies" value="{{ old('technologies') }}" required>
        </div>

        <div class="form-group">
            <label for="project_url">Project URL</label>
            <input type="url" class="form-control" id="project_url" name="project_url" value="{{ old('project_url') }}" required>
        </div>

        <div class="form-group">
            <label for="project_photo">Photo</label>
            <input type="file" class="form-control-file" id="project_photo" name="project_photo">
        </div>

        <button type="submit" class="btn btn-primary">Create Project</button>
        <a href="{{ route('projects.index', request()->route()->parameter('User_Id')) }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
@endsection
