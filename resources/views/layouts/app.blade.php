<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Favbee Admin') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('/vendors/simple-datatables/style.css') }}">

        <!-- Iconly -->
        <link rel="stylesheet" href="{{ asset('/vendors/iconly/bold.css') }}">
        
        <!-- Vendors -->
        <link rel="stylesheet" href="{{ asset('/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
        <link rel="stylesheet" href="{{ asset('/vendors/bootstrap-icons/bootstrap-icons.css') }}">

        <!-- Include Choices CSS -->
        <link rel="stylesheet" href="{{ asset('/vendors/choices.js/choices.min.css') }}" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">


        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <div id="app">
            @livewire('layouts.partials.sidebar')
            
            <div id="main" class='layout-navbar'>
                @livewire('layouts.partials.header')
                <div id="main-content">

                    <div class="page-heading">
                        <div class="page-title">
                            {{ $header }}
                        </div>
                        {{ $slot }}
                    </div>

                    @livewire('layouts.partials.footer')
                </div>
            </div>
        </div>
        <script src="{{ asset('/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('/vendors/apexcharts/apexcharts.js') }}"></script>
        <script src="{{ asset('/js/pages/dashboard.js') }}"></script>    
        <script src="{{ asset('/vendors/simple-datatables/simple-datatables.js') }}"></script>
        <script src="{{ asset('/vendors/choices.js/choices.min.js') }}"></script>
        <script src="{{ asset('/js/dropzone.js') }}"></script>
        <script src="{{ asset('/vendors/tinymce/tinymce.min.js') }}"></script>
        <script src="{{ asset('/vendors/tinymce/plugins/code/plugin.min.js') }}"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <script>
            // Simple Datatable
            let table = document.querySelector('#table');
            let dataTable = new simpleDatatables.DataTable(table);
        </script>
        <script>
            function readFile(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();
        
            reader.onload = function(e) {
              var htmlPreview =
                '<img width="200" src="' + e.target.result + '" />' +
                '<p>' + input.files[0].name + '</p>';
              var wrapperZone = $(input).parent();
              var previewZone = $(input).parent().parent().find('.preview-zone');
              var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');
        
              wrapperZone.removeClass('dragover');
              previewZone.removeClass('hidden');
              boxZone.empty();
              boxZone.append(htmlPreview);
            };
        
            reader.readAsDataURL(input.files[0]);
          }
        }
        
        function reset(e) {
          e.wrap('<form>').closest('form').get(0).reset();
          e.unwrap();
        }
        
        $(".dropzone").change(function() {
          readFile(this);
        });
        
        $('.dropzone-wrapper').on('dragover', function(e) {
          e.preventDefault();
          e.stopPropagation();
          $(this).addClass('dragover');
        });
        
        $('.dropzone-wrapper').on('dragleave', function(e) {
          e.preventDefault();
          e.stopPropagation();
          $(this).removeClass('dragover');
        });
        
        $('.remove-preview').on('click', function() {
          var boxZone = $(this).parents('.preview-zone').find('.box-body');
          var previewZone = $(this).parents('.preview-zone');
          var dropzone = $(this).parents('.form-group').find('.dropzone');
          boxZone.empty();
          previewZone.addClass('hidden');
          reset(dropzone);
        });
        </script>
        <script>
              tinymce.init({ selector: '#default' });
              tinymce.init({ selector: '#dark', toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code', plugins: 'code' });
        </script>

        @livewireScripts
        <script src="{{ asset('/js/main.js') }}"></script>

    </body>
</html>
