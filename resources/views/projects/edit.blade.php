@extends('menuTemplate')

@section('content')
<div class="container mb-5">
    <h1 class="my-4">Edit Project</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $project->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="7" required>{{ $project->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="technologies">Technologies</label>
            <input type="text" class="form-control" id="technologies" name="technologies" value="{{ $project->technologies }}" required>
        </div>

        <div class="form-group">
            <label for="project_url">Project URL</label>
            <input type="url" class="form-control" id="project_url" name="project_url" value="{{ $project->project_url }}">
        </div>

        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" class="form-control-file" id="photo" name="photo">
            @if ($project->photo)
                <p class="mt-2">Imagen Actual:</p>
                <img src="{{ $project->photo }}" class="project-foto-preview img-fluid mt-2" alt="{{ $project->title }}">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Project</button>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@endsection
