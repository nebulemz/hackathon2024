@if($errors->any())
    @foreach ($errors->all() as $error)
        {{ App\Helpers::errorToast($error) }}
    @endforeach
@endif

@if ($message = session('success'))
    {{ App\Helpers::successToast($message) }}
@endif

@if ($message = session('error'))
    {{ App\Helpers::errorToast($message) }}
@endif

@if ($message = session('info'))
    {{ App\Helpers::infoToast($message) }}
@endif
