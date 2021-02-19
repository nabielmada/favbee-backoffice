<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Konsumen</h3>
                <p class="text-subtitle text-muted">Master konsumen favbee</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Konsumen</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>


    <div class = "row">
    <div class = "col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover" id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Whatsapp</th>
                            <th>Created</th>
                            <th>Status</th>
                            <th>Blokir</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php $no = 1; ?>
                        @foreach($konsumen as $k )
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $k->username }}</td>
                            <td>{{ $k->nohp }}</td>
                            <td>{{ $k->created_at }}</td>
                            <td>{{ $k->status }}</td>
                            <td>{{ $k->status }}</td>
                        </tr>
                            
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    
    
</x-app-layout>
