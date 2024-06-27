
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Role : {{$role->name}}
                        <a href="{{url('roles')}}" class="btn btn-sm btn-dark float-end" >Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{url('roles/'.$role->id.'/give-permissions')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            @error('permission')
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                            @enderror
                            <label for="" class="mb-2">Permissions</label>

{{--                            <select class="form-select" size="3" aria-label="size 3 select example">--}}
{{--                                <option selected>Open this select menu</option>--}}
{{--                                <option value="1">One</option>--}}
{{--                                <option value="2">Two</option>--}}
{{--                                <option value="3">Three</option>--}}
{{--                            </select>--}}


                                <select name="permission[]" multiple class="form-select" size="3" aria-label="size 3 select example">

                                        <option value="name">
                                            @foreach($permissions as $permission)
                                                <option value="{{$permission}}"  {{in_array($permission->id,$rolePermissions) ? 'selected' : ''}}>
                                                    {{$permission->name}}
                                                </option>
                                            @endforeach
                                        </option>
                                </select>

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
<script src="{{asset('js/bootstrap.min.js')}}" ></script>
<script src="{{asset('js/popper.min.js')}}" ></script>
<script src="{{asset('js/bundle.min.js')}}" ></script>

