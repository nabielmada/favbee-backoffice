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
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href = "/cs">Customer Services</a> / Add
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>

    <style>
.box {
  position: relative;
  background: #ffffff;
  width: 100%;
}

.box-header {
  color: #444;
  display: block;
  padding: 10px;
  position: relative;
  border-bottom: 1px solid #f4f4f4;
}

.box-tools {
  position: absolute;
  right: 10px;
  top: 5px;
}

.dropzone-wrapper {
  border: 2px dashed #91b0b3;
  color: #92b0b3;
  position: relative;
  height: 150px;
}

.dropzone-desc {
  position: absolute;
  margin: 0 auto;
  left: 0;
  right: 0;
  text-align: center;
  width: 40%;
  top: 30px;
  font-size: 16px;
}

.dropzone,
.dropzone:focus {
  position: absolute;
  outline: none !important;
  width: 100%;
  height: 150px;
  cursor: pointer;
  opacity: 0;
}

.dropzone-wrapper:hover,
.dropzone-wrapper.dragover {
  background: #ecf0f5;
}

.preview-zone {
  text-align: center;
}

.preview-zone .box {
  box-shadow: none;
  border-radius: 0;
  margin-bottom: 0;
}
    </style>

<form action="{{ route('cs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class = "row">
        <div class = "col-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" data-bs-toggle="tooltip" title="Required!" >
                        Photo Profile <code> * </code>
                    </h4>
                </div>
                <div class="card-body">
                    <section>
                          <div class="container">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <div class="preview-zone hidden">
                                    <div class="box box-solid">
                                      <div class="box-header with-border">
                                        <div class = "float-start"><b>Preview</b></div>
                                        <div class="box-tools pull-right">
                                          <button type="button" class="btn btn-danger btn-xs remove-preview">
                                            <i class="fa fa-times"></i> Hapus
                                          </button>
                                        </div>
                                        <br/>
                                        <br/>
                                      </div>
                              
                                      <div class="box-body"></div>
                                      
                                      <br/>
                                    </div>
                                        @if($errors->has('avatar'))
                                        <div class="text-danger mt-2">
                                            {{ $errors->first('avatar')}}
                                        </div>
                                        @endif
                                  </div>
                                  <br/>
                                  <div class="dropzone-wrapper">
                                    <div class="dropzone-desc">
                                      <i class="glyphicon glyphicon-download-alt"></i>
                                      <p>Choose an image file or drag it here.</p>
                                    </div>
                                    <input type="file" name="avatar" class="dropzone">
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
        </div>

    <div class = "col-8">
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

                <div class="col-6 form-group">
                    <label class = "mb-2">Alamat</label>
                    <input type="text" id="alamat" class="form-control"
                        name="alamat" placeholder="Alamat...">

                        @if($errors->has('alamat'))
                    <div class="text-danger mt-2">
                        {{ $errors->first('alamat')}}
                    </div>
                        @endif

                </div>

                <div class="col-6 form-group">
                    <label class = "mb-2">Kota</label>
    @php

    $curl = curl_init();

    // API Key RajaOngkir user:Nabielmada

    curl_setopt_array($curl, array(
      CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "key: 9984da530e9c4909b88fb6d55833b230"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    // Convert JSON to Array untuk pemanggilan di foreach
    $arrayResponse = json_decode($response, true); 
    $tempListKota = $arrayResponse['rajaongkir']['results'];

    @endphp
                    <select name="kota" id="kota" class = "form-select choices">
                        <option value = "" selected> Pilih kota </option>
                        @foreach ($tempListKota as $item )
                            <option value="{{$item['city_name']}}">{{$item['city_name']}}</option>
                        @endforeach
                        
                    </select>

                        @if($errors->has('kota'))
                    <div class="text-danger mt-2">
                        {{ $errors->first('kota')}}
                    </div>
                        @endif

                </div>

                <div class="col-12 form-group">
                    <label class = "mb-2">No Hp / Wa</label>
                    <input type="text" id="nohp" class="form-control" autofocus
                        name="nohp" placeholder="No hp / whatsapp...">

                        @if($errors->has('nohp'))
                    <div class="text-danger mt-2">
                        {{ $errors->first('nohp')}}
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
    </div> <!-- Akhir Row -->
        </div>
            </div>
    </form>
    
</x-app-layout>
