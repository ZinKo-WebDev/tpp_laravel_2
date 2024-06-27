

<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-13">
            <div class="card">
                <div class="card-header">
                    <h4>Create Role
                        <a href="{{url('roles')}}" class="btn btn-sm btn-dark float-end" >Back</a>
                    </h4>
                </div>
                <div class="card-body">

                        <form action="{{url('roles')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="">Role Name</label>
                                <input type="text" name="name" class="form-control" autocomplete="off"/>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-sm btn-warning text-white" type="submit">Save</button>
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

