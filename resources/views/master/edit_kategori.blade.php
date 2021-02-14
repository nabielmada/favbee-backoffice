<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Kategori</h3>
                <p class="text-subtitle text-muted">Master kategori untuk product</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Kategori</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>


    <div class = "row">
    <div class = "col-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title">Edit Form</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" method="POST" action="{{ route('edit_kategori') }}">

                                @csrf

                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12 form-group">
                                            <label class = "mb-2">Kategori</label>
                                            <input type="text" id="kategori" class="form-control" autofocus
                                                name="kategori" placeholder="Kategori...">

                                    @if($errors->has('kategori'))
                                <div class="text-danger mt-2">
                                    {{ $errors->first('kategori')}}
                                </div>
                                    @endif

                                        </div>

                                        {{-- Auth --}}
                                         <input type="hidden" id="userid" class="form-control" readonly
                                                name="userid" value = "{{ Auth::user()->name }}"> 
                                        
                                        <div class="col-sm-12 d-flex justify-content-end mt-3">
                                            <button type="submit"
                                                class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>

    <div class = "col-6">
        <div class="card">
            <div class="card-header">
            {{-- <a href = "{{ route('add_kategori') }}" 
                class = "btn btn-md btn-primary">
                <i class = "bi bi-plus"></i> Tambah 
            </a> --}}
            </div>
            <div class="card-body">
                <table class="table table-hover" id="table_kategori">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php $no = 1; ?>
                        @foreach($kategori as $k )
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $k->kategori }}</td>
                            <td>
                                <a href="/kategori/edit/{{ $k->id }}" class="btn btn-sm btn-info"><i class = "bi bi-pencil"></i></a>
                                <a href="/kategori/destroy/{{ $k->id }}" class="btn btn-sm btn-danger"><i class = "bi bi-trash"></i></a>
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
