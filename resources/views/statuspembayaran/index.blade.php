@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
 
                    <a href="{{ url('status-pembayaran/add') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                </p>
            </div>
            <div class="box-body">
               
                <div class="table-responsive">
                    <table class="table table-hover myTable">
                        <thead>
                            <tr>
                                <th>action</th>
                                <th>nama</th>
                                <th>Urutan</th>
                                <th>created at</th>
                                <th>updated at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $dt)
                            <tr>
                                <td>
                                    <div style="width:60px">
                                        <a href="{{ url('status-pembayaran/'.$dt->id) }}" class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>
 
                                        <button href="{{ url('status-pembayaran/'.$dt->id) }}" class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>
                                    </div>
                                </td>
                                <td>{{ $dt->nama }}</td>
                                <td>{{ $dt->urutan }}</td>
                                <td>{{ $dt->created_at }}</td>
                                <td>{{ $dt->updated_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
 
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