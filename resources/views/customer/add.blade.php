@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <a href="{{ url('customer') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i> Kembali</a>
                </p>
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="box-body">
               
                <form role="form" method="post" action="{{ url('customer/add') }}">
                    @csrf
                  	<div class="box-body">
 
                    	<div class="form-group">
                      		<label for="exampleInputEmail1">Email</label>
                      		<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                    	</div>

                    	<div class="form-group">
                      		<label for="exampleInputEmail1">Nama </label>
                      		<input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama">
                    	</div>

                    	<div class="form-group">
                      		<label for="exampleInputPassword1">No HP</label>
                      		<input type="number" name="nohp" class="form-control" id="exampleInputPassword1" placeholder="No HP">
                    	</div>
 
                    	<div class="form-group">
                      		<label for="exampleInputPassword1">Alamat</label>
                      		<textarea class="form-control" name="alamat" rows="5"></textarea>
                    	</div>
                   
                  	</div>
                  	<!-- /.box-body -->
     
                  	<div class="box-footer">
                    	<button type="submit" class="btn btn-primary">Submit</button>
                  	</div>
                </form>
 
            </div>
        </div>
    </div>
</div>
 
@endsection
 
@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){
 
        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })
</script>
 
@endsection