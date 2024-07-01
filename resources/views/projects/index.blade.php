@extends('menuTemplate')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-1 m-2">
                <a href="{{ route('personal_data.index', request()->route()->parameter('User_Id')) }}" class="btn btn-primary">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>
            <h1 class="col-8">Proyectos</h1>
        </div>

        <div class="row my-4">
            <h3 class="col-8">Estos son los proyectos en los que he trabajado:</h3>
            <div class="col-3"></div>
            @if (request()->route()->hasParameter('User_Id'))
                <a href="{{ route('projects.create', request()->route()->parameter('User_Id')) }}" class="col-1 btn btn-success">
                    <i class="bi bi-plus-square project-header-icon"></i>
                </a>
            @endif
        </div>

        @if($projects->count() > 0)
            <div class="card-container">
                @foreach($projects as $project)
                    <div class="card h-100 mb-4">
                        <div class="ContainerImagen bg-dark">
                            <img src="{{ $project->photo }}" class="ContainerImagen-imagenProyecto" alt="{{ $project->title }}">
                        </div>

                        <div class="card-body">
                            <h3 class="card-title">{{ $project->title }}</h3>
                            <p class="card-text">{{ $project->description }}</p>
                        </div>

                        <div class="card-footer row">
                            <a href="{{ $project->project_url }}" class="m-1 col-7 btn btn-primary w-100" target="_blank" rel="noopener noreferrer">
                                Ir al Proyecto
                            </a>
                            <a href="{{ route('projects.edit', ['User_Id' => request()->route()->parameter('User_Id'), 'Id' => $project->id]) }}" class="m-1 col-2 btn btn-primary w-100" rel="noopener noreferrer">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('projects.destroy', ['User_Id' => request()->route()->parameter('User_Id'), 'Id' => $project->id]) }}" method="POST" class="m-1 col-2 p-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-danger">No hay proyectos actualmente</p>
        @endif
    </div>
@endsection
