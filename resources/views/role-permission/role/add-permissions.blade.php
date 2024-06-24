<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Role : {{ $role->name }}
                        <a href="{{ url('roles') }}" class="btn btn-sm btn-dark float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('roles/' . $role->id . '/give-permissions') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            @error('permission')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                            <label for="">Permissions</label>
                            <div class="row  mt-3 mb-2">
                                @foreach ($permissions as $permission)
                                    <div class="col-md-2">
                                        <label>
                                            <input type="checkbox" value="{{ $permission->name }}" name="permission[]"
                                                autocomplete="off"
                                                {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }} />
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-sm btn-warning text-white" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bundle.min.js') }}"></script>
