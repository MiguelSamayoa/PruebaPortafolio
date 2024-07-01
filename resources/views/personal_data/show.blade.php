@extends('menuTemplate')

@section('content')
    <div class="text-center my-5">
            <h1 class="display-4">
                {{$personalData->first_name}} {{$personalData->last_name}}
                <a class="p-3" href="{{ route('personal_data.edit', $personalData->id) }}">
                    <i class="bi bi-pencil-square"></i>
                </a>
            </h1>
            <h2>{{$personalData->presentation}}</h2>
            <h6> {{$personalData->email}} </h6>
            <h6> {{$personalData->phone}} </h6>
            <h6> {{$personalData->address}} </h6>
            @if($personalData->photo_url)
                <img id="foto" src="{{ $personalData->photo_url }}" class="portada" alt="Foto de Perfil" />
            @else
                <img id="foto" src="/storage/images/DefaultPhoto.jpg" class="portada" alt="Foto de Perfil" />
            @endif
            <h6><a href="{{ route('projects.index', $personalData->id) }}" class="btn btn-primary mt-2"> Ver proyectos </a></h6>
        </div>


        <div class="row justify-content-center text-center mt-5 mb-3  bg-primary pb-5">

            <div class="col col-md-7 text-light p-md-2">
                <h1 class="mt-4"> Te doy la bienvenida </h1>
                <p class="mb-1">
                    {{$personalData->description}}
                </p>
            </div>

        </div>
@endsection
