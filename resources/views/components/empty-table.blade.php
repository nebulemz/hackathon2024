<div class="d-flex justify-content-center flex-column ">
    <div class="text-center">
        <img src="{{ asset('images/logo/empty-table.svg') }}" alt="Empty table" style="object-fit: contain" height="{{ $height ?? "500px" }}" width="{{ $width ?? "500px" }}">
    </div>
    <h2 class="text-center">{{ $message ?? 'Empty' }}</h2>
</div>
