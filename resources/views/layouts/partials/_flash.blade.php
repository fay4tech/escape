<div class="panel-body">
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p class="text-center">{{ \Session::get('success') }}</p>
        </div><br />
    @endif
    @if (\Session::has('error'))
        <div class="alert alert-danger">
            <p class="text-center">{{ \Session::get('error') }}</p>
        </div><br />
    @endif
</div>