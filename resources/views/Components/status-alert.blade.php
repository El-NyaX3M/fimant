@props(['color', 'status', 'mensaje'])
<div {{ $attributes -> merge(['class' => 'alert alert-dismissible fade show alert-'.$color]) }} role="alert">
    <strong>{{ $status }}!</strong> {{ $status == 'Hecho' ? 'Proceso completado correctamente.' : 'El proceso no pudo ser completado correctamente.' }}
    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
