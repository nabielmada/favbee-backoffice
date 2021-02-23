<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Master Product</h3>
                <p class="text-subtitle text-muted">Master product favbee</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Product</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>

    <div class="row justify-content-center">
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon blue">
                                <i class="iconly-boldBag-2"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Total Product</h6>
                            <h6 class="font-extrabold mb-0">{{ $product_count }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon green">
                                <i class="iconly-boldActivity"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Total Active</h6>
                            <h6 class="font-extrabold mb-0">112.000</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon red">
                                <i class="iconly-boldDanger"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Total Non</h6>
                            <h6 class="font-extrabold mb-0">112.000</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class = "row">
    <div class = "col-12">
        <div class="card">
            <div class="card-header">
                <div class="col-sm-12">

                    @if(session()->get('success'))
                      <div class="alert alert-success">
                        {{ session()->get('success') }}  
                      </div>
                    @endif
                    
                  </div>

            <a href = "/product-add" 
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
                            <th>Stock</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php $no = 1; ?>
                        @foreach($product as $p )
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>
                                
                                <div class="avatar avatar-lg me-3">
                                    @foreach (json_decode($p->avatar) as $avatar)
                                        <img src="/images/product/{{$avatar}}" />
                                    @endforeach
                                </div>
                                
                                {{ $p->nama }}
                            </td>
                            <td>{{ $p->stock }}</td>
                            <td>{{ $p->harga }}</td>
                            <td>

                                @if ($p->status == 'Y')
                                    <span class="badge bg-light-success">Active</span>
                                @elseif($p->status == 'N')
                                    <span class="badge bg-light-danger">Non-Active</span>
                                @else
                                    <span class="badge bg-light-warning">Pending</span>
                                @endif
                                
                            </td>
                            <td>
                                <a href="#" value="{{ route('product.show', $p ) }}" class="btn btn-sm btn-info modalMd" title="Show Data" data-toggle="modal" data-target="#modalMd"><span class="bi bi-search"></span></a>
                                
                                <form method = "post" action="{{ route('product.destroy', $p ) }}" class = "d-inline">
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
