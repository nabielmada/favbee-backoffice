<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Customer Services</h3>
                <p class="text-subtitle text-muted">Master customer services favbee</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Customer Services</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>


    <div class = "row">
    <div class = "col-12">
        <div class="card">
            <div class="card-header">
            <a href = "{{ route('cs.store') }}" 
                class = "btn btn-md btn-primary">
                <i class = "bi bi-plus"></i> Tambah 
            </a>
            </div>
            <div class="card-body">
                <table class="table table-hover" id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Wa</th>
                            <th>Penjualan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php $no = 1; ?>
                        @foreach($cs as $c )
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $c->nama }}</td>
                            <td>{{ $c->alamat }}</td>
                            <td>{{ $c->nowa }}</td>
                            <td>{{ $c->cs_penjualan }}</td>
                            <td>{{ $c->status }}</td>
                            <td>
                                <a href="{{ route('cs.edit', $c) }}" class="btn btn-sm btn-info"><i class = "bi bi-pencil"></i></a>
                                <form method = "post" action="{{ route('cs.destroy', $c ) }}" class = "d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin untuk menghapus ?')" ><i class = "bi bi-trash"></i></button>
                                </form> 
                            </td>
                        </tr>
                            
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    
    
</x-app-layout>
