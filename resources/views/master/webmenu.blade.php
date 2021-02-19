<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Web Menu</h3>
                <p class="text-subtitle text-muted">Master web menu untuk user</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Web Menu</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>


    <div class = "row">
    <div class = "col-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title">Input Form Deskripsi</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            
                            @foreach($webmenu as $w )
                            <form class="form form-vertical" method="POST" action="{{ route('webmenu.update', $w) }}">

                                @csrf
                                @method('put')

                                
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12 form-group">
                                            <label class = "mb-2">Heading</label>
                                            <input type="text" id="deskripsi_heading" class="form-control" autofocus
                                                   name="deskripsi_heading" value = "{{ $w->deskripsi_heading }}">

                                    @if($errors->has('deskripsi_heading'))
                                <div class="text-danger mt-2">
                                    {{ $errors->first('deskripsi_heading')}}
                                </div>
                                    @endif

                                        </div>

                                        <div class="col-12 form-group">
                                        <label class = "mb-2">Sub</label>
                                        <input type="text" id="deskripsi_sub" class="form-control"
                                               name="deskripsi_sub" value = "{{ $w->deskripsi_sub }}">

                                    @if($errors->has('deskripsi_sub'))
                                <div class="text-danger mt-2">
                                    {{ $errors->first('deskripsi_sub')}}
                                </div>
                                    @endif

                                    </div>

                                        {{-- Auth --}}
                                         <input type="hidden" id="userid" class="form-control" readonly
                                                name="userid" value = "{{ Auth::user()->name }}"> 
                                        
                                        <div class="col-sm-12 d-flex justify-content-end mt-3">
                                            <button type="submit"
                                                class="btn btn-primary me-1 mb-1">Edit</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            @endforeach
                            
                        </div>
                    </div>
                </div>
        </div>

    <div class = "col-6">
        <div class="card">
            <div class="card-header">
                <div class="col-sm-12">

                    @if(session()->get('success'))
                      <div class="alert alert-success">
                        {{ session()->get('success') }}  
                      </div>
                    @endif
                  </div>
            </div>
            <div class="card-body">
                <table class="table table-hover" id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Heading</th>
                            <th>Sub</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php $no = 1; ?>
                        @foreach($webmenu as $w )
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $w->deskripsi_heading }}</td>
                            <td>{{ $w->deskripsi_sub }}</td>
                            <td>
                                <a href="{{ route('webmenu.edit', $w) }}" class="btn btn-sm btn-info"><i class = "bi bi-pencil"></i></a> 
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
