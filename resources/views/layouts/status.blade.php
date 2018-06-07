@if (session('success'))
    <div class="alert alert-success">
        <b>Success:</b>{{ session('success') }}
    </div>
@endif
@if (session('warning'))
    <div class="alert alert-warning">
        <b>Warning:</b>{{ session('warning') }}
    </div>
@endif
@if (session('info'))
    <div class="alert alert-info">
        <b>Info:</b>{{ session('info') }}
    </div>
@endif
@if (session('secondary'))
    <div class="alert alert-secondary">
        <b>Success:</b>{{ session('secondary') }}
    </div>
@endif