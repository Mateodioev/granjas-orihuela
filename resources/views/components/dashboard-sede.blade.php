<div class="p-4 border-b border-gray-200 flex items-center space-x-4">
    <img src="{{ asset('images/logo.png') }}" class="h-12">
    @can(\App\Enums\PermissionEnum::VerOtrasSedes)
    <select class="select select-ghost">
        <option disabled>Sede</option>
        <option value="0" selected>Todas</option>
        @foreach ($sedes as $_sede)
            <option value="{{ $_sede->id }}">{{ $_sede->nombre }}</option>
        @endforeach
    </select>
    @else
        <span>{{ $sede->nombre }}</span>
    @endcan
</div>