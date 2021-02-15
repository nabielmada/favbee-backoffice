<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Product</h3>
                <p class="text-subtitle text-muted">Master product favbee</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href = "/product">Product</a> / Add
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>

<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class = "row">

    <div class = "col-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Input Form</h4>
            </div>
            <div class="card-body">

    <div class = "row">
                <div class="col-12 form-group">
                    <label class = "mb-2">Nama</label>
                    <input type="text" id="nama" class="form-control" autofocus
                        name="nama" placeholder="Nama...">

                        @if($errors->has('nama'))
                    <div class="text-danger mt-2">
                        {{ $errors->first('nama')}}
                    </div>
                        @endif

                </div>

                <div class="col-12 form-group">
                  <label class = "mb-2">Kategori</label>
                    <select name="kategori" id="kategori" class = "form-select choices">
                        <option value="">Pilih Kategori</option>
                      @foreach ($kategori as $k)
                        <option value="{{ $k->kategori }}">{{ $k->kategori }}</option>
                      @endforeach
                    </select>
                      @if($errors->has('kategori'))
                  <div class="text-danger mt-2">
                      {{ $errors->first('kategori')}}
                  </div>
                      @endif

              </div>

              <div class="col-12 form-group">
                <label class = "mb-2">Tag</label>
                <select name = "tag[]" id = "tag" class="choices form-select multiple-remove" multiple="multiple">
                      @foreach ($tag as $t)
                        <option value="{{ $t->tag }}">{{ $t->tag }}</option>
                      @endforeach                
                </select>

                    @if($errors->has('tag'))
                <div class="text-danger mt-2">
                    {{ $errors->first('tag')}}
                </div>
                    @endif

            </div>

            <div class="col-12 form-group">
              <label class = "mb-2">Stock</label>
              <input type="number" min = "0" id="stock" class="form-control"
                  name="stock" placeholder="Stock...">

                  @if($errors->has('stock'))
              <div class="text-danger mt-2">
                  {{ $errors->first('stock')}}
              </div>
                  @endif

          </div>

          <div class="col-6 form-group">
            <label class = "mb-2">Harga</label>
            <input type="number" min = "0" id="harga" class="form-control"
                name="harga" placeholder="Harga...">

                @if($errors->has('harga'))
            <div class="text-danger mt-2">
                {{ $errors->first('harga')}}
            </div>
                @endif

        </div>
        

        <div class="col-6 form-group">
          <label class = "mb-3">Promo Diskon </label>
          <br/>
          @foreach ($diskon as $d)
          <div class="form-check d-inline-block" data-bs-toggle="tooltip" title="{{ $d->ket }}">
              <input class="form-check-input" type="radio" name="diskon" id="diskon">
            <label class="form-check-label">
                  {{ $d->diskon }} %
              </label>  
            </div>
            @endforeach
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

        
    </div> <!-- Akhir Row -->
        </div>

        <div class = "col-6">
          <div class="card">
              <div class="card-header">
                  <h4 class="card-title" data-bs-toggle="tooltip" title="Required!" >
                      Photo Product <code> * </code>
                  </h4>
              </div>
              <div class="card-body">
                  <section>
                        <div class="container">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">

                                <div class="dropzone-wrapper">
                                  <div class="dropzone-desc">
                                    <i class="glyphicon glyphicon-download-alt"></i>
                                    <p>Choose an image file or can be multiple with drag & drop file.</p>
                                  </div>

                                  <div class="input-group mb-3">
                                    <label class="input-group-text"><i
                                            class="bi bi-upload"></i></label>
                                    <input type="file" class="form-control" name = "avatar[]" id="avatar" multiple>
                                </div>
                                </div>

                              </div>
                            </div>
                          </div>
                    
                          {{-- <div class="row">
                            <div class="col-md-12">
                              <button type="submit" class="btn btn-primary btn-block pull-right">Upload Gambar</button>
                            </div>
                          </div> --}}
                        </div>
                    </section>
              </div>
            </div>

            <div class="card">
              <div class="card-header">
                  <h4 class="card-title" data-bs-toggle="tooltip" title="Required!" >
                      Deskripsi Product <code> * </code>
                  </h4>
              </div>
              <div class="card-body">
                <textarea id="dark" cols="30" rows="10" name = "des"></textarea>
            </div>
            </div>

      </div>


            </div>
    </form>
    
</x-app-layout>
