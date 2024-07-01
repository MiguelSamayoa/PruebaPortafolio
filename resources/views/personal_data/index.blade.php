@extends('menuTemplate')

@section('content')
    @foreach ($personalData as $data)

        <div class="text-center mb-5">
            <h1 class="display-4">
                {{$data->first_name}} {{$data->last_name}}
                <a  href="{{ route('personal_data.edit', $data->id) }}">
                    <i class="bi bi-pencil-square"></i>
                </a>
            </h1>
            <h2>{{$data->presentation}}</h2>
            <h6> {{$data->email}} </h6>
            <h6> {{$data->phone}} </h6>
            <h6> {{$data->address}} </h6>
            @if($data->photo_url)
                <img id="foto" src="{{ $data->photo_url }}" class="portada" alt="Foto de Perfil" />
            @else
                <img id="foto" src="/storage/images/DefaultPhoto.jpg" class="portada" alt="Foto de Perfil" />
            @endif
            <h6><a href="{{ route('projects.index', $data->id) }}" class="btn btn-primary mt-2"> Ver proyectos </a></h6>
        </div>


        <div class="row justify-content-center text-center mt-5 mb-3  bg-primary pb-5">

            <div class="col col-md-7 text-light p-md-2">
                <h1 class="mt-4"> Te doy la bienvenida </h1>
                <p class="mb-1">
                    {{$data->description}}
                </p>
            </div>

        </div>
    @endforeach

@endsection
