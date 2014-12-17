@if(Session::has('success'))
    <div class="alert alert-success alert-notification" role="alert">{{ Session::get('success') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-danger alert-notification" role="alert">
    @foreach ($errors->all() as $message)
        {{ $message }}<br />
    @endforeach
    </div>
@endif