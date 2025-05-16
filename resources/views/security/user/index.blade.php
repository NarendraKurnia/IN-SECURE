@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ asset('security/user/proses') }}" method="post" accept-charset="utf-8">
{{ csrf_field() }}
<div class="row">


  <div class="col-md-12">
    <div class="btn-group"> 
        <a href="{{ asset('security/user/tambah') }}" style="color: white;">
        <button type="button" class="btn btn-success " data-toggle="modal" data-target="#Tambah">
            <i class="fa fa-plus"></i> Tambah User
        </a>
    </div>
</div>
</div>
<div class="table-responsive mailbox-messages mt-1">        
<table class="table mt-3 table-sm table-bordered">
    <thead>
        <tr class="bg-info">
            <th class="text-center">NO</th>
            <th>NAMA</th>
            <th>EMAIL</th>
            <th>USERNAME</th>
            <th>UNIT</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach($user as $user)
        <tr>
            <td class="text-center">{{ $no }}</td>
            <td><?php echo $user->nama ?></td>
            <td><?php echo $user->email ?></td>
            <td><?php echo $user->username ?></td>
            <td>{{ $user->unit ? $user->unit->nama : 'Tidak ada unit' }}</td>
            <td>
                <div class="btn-group">
                <a href="{{ asset('security/user/edit/'.$user->id_user) }}" 
                class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                <!-- <a href="{{ route('user.delete', $user->id_user) }}" 
                class="btn btn-danger btn-sm delete-link"><i class="fa fa-trash"></i>
                </a> -->

                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target={{"#exampleModal" . $user->id_user}}>
                    <i class="fa fa-trash"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id={{"exampleModal" . $user->id_user}} tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    Data Yang di Hapus Tidak Dapat Dikembalikan!!!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <form action="{{ route('user.delete', $user->id_user) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Hapus Data</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            </td>
        </tr>
        @php $no++; @endphp
        @endforeach
    </tbody>
</table>
</div>
