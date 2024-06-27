


<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
<div class="container mt-5">
    <div class="row">
        <div class="col-md-13">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Role
                        <a href="{{url('roles')}}" class="btn btn-sm btn-dark float-end" >Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{url('roles/'.$role->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="">Role Name</label>
                            <input type="text" name="name" class="form-control" autocomplete="off" value="{{$role->name}}"/>
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

