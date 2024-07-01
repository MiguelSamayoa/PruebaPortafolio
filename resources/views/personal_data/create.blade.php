@extends('menuTemplate')

@section('content')
<div class="container mb-5">
    <h1 class="my-4">Create Personal Data</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('personal_data.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="first_name">Nombres</label>
            <input type="text" class="form-control" id="first_name" name="first_name" minlength="4" value="{{ old('first_name') }}" placeholder="Introduce tu Nombre" required>
        </div>

        <div class="form-group">
            <label for="last_name">Apellidos</label>
            <input type="text" class="form-control" id="last_name" name="last_name" minlength="4" value="{{ old('last_name') }}" placeholder="Introduce tu Apellido" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Introduce tu email" required>
        </div>

        <div class="form-group">
            <label for="phone">Número Telefónico</label>
            <input type="tel" class="form-control" id="phone" name="phone" pattern="\(\+[0-9]{3}\) [0-9]{4} [0-9]{4}" maxlength="16" value="{{ old('phone') }}" placeholder="(+123) 1234 1234" required>
        </div>


        <div class="form-group">
            <label for="address">Dirección</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" placeholder="Introduce tu dirección" required>
        </div>

        <div class="form-group">
            <label for="presentation">Presentación</label>
            <textarea class="form-control" id="presentation" name="presentation" rows="3" placeholder="Escribe tu presentación" required>{{ old('presentation') }}</textarea>
        </div>

        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea class="form-control" id="description" name="description" rows="6" placeholder="Escribe una descripción detallada" required>{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" class="form-control-file" id="photo" name="photo">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ url('/') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- Script para darle formato al campo Número Telefónico -->
<script>
document.getElementById('phone').addEventListener('input', function (e) {
    var value = e.target.value.replace(/\D/g, ''); // Remueve todos los caracteres no numéricos

    if (value.length > 3) {
        value = `(+${value.slice(0, 3)}) ${value.slice(3, 7)}${value.length > 7 ? ' ' + value.slice(7, 11) : ''}`;
    } else {
        value = `(+${value})`;
    }

    e.target.value = value; // Actualiza el valor del campo de entrada
});
</script>

@endsection
