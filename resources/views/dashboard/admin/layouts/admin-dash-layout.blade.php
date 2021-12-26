
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <base href="{{\URL::to('/')}}">

  <link href="img/imapala.png" rel="icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/ijaboCropTool/ijaboCropTool.min.css') }}">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Datatables -->
  <link rel="stylesheet" href="http://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <link type="text/css" href='https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css' rel='stylesheet'>
  <link type="text/css" href='https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" />
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <link rel="shortcut icon" href="img/imapala.png">
  <!-- leafletjs -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
  crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
  integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
  crossorigin=""></script>
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
          <a class="dropdown-item" href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form> -->
      </li>
    </ul>


  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{\URL::to('/admin/dashboard')}}" class="brand-link">
      <img src="img/images.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ Auth::user()->picture }}" class="img-circle elevation-2 admin_picture" alt="User Image">
        </div>
        <div class="info">
          <a href="{{route('admin.dashboard')}}" class="d-block admin_name">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link {{(request()->is('admin/dashboard'))? 'active':''}}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Master Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.berita')}}" class="nav-link {{(request()->is('admin/berita'))? 'active':''}}">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Berita</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
               <a href="{{route('admin.pendaki')}}" class="nav-link {{(request()->is('admin/pendaki'))? 'active':''}}">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Data Pendaki</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.penyewaan')}}" class="nav-link {{(request()->is('admin/penyewaan'))? 'active':''}}">
                  <i class="fas fa-cog nav-icon"></i>
                  <p>Data Penyewaan</p>
                </a>
              </li>
            </ul>
          </li>
   <!--        <li class="nav-item">
            <a href="{{route('admin.akun')}}" class="nav-link {{(request()->is('admin/akun'))? 'active':''}}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                List Akun User
              </p>
            </a>
          </li>
 -->          <li class="nav-item">
            <a href="{{route('admin.user')}}" class="nav-link {{(request()->is('admin/user'))? 'active':''}}">
              <i class="nav-icon fas fa-cog"></i>
              <p>
               List Akun Admin
             </p>
           </a>
         </li>
         <li class="nav-item">
          <a href="{{route('admin.contact')}}" class="nav-link {{(request()->is('admin/contact'))? 'active':''}}">
            <i class="nav-icon fas fa-user"></i>
            <p>
             Contact Us
           </p>
         </a>
       </li>
       <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <i class="nav-icon fas fa-cog"></i>
        {{ __('Logout') }}
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </li>
  </ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <div class="container">
   @yield('content')
 </div>
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
  <div class="p-3">
    <h5>Title</h5>
    <p>Sidebar content</p>
  </div>
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
  <!-- To the right -->
  <!-- <div class="float-right d-none d-sm-inline">
    Anything you want
  </div> -->
  <!-- Default to the left -->
  <strong>Copyright &copy; 2021 <a href="{{route('admin.dashboard')}}" target="_blank">Gunung Prau</a> </strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Datatables JS -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
<script>
  $(document).ready(function() {
    $('#userTable').DataTable( {
      dom: 'Bfrtip',
      buttons: [
      'colvis'
      ]
    } );
  } );
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('plugins/ijaboCropTool/ijaboCropTool.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function() {
      $(this).remove();
    });
  }, 3000);
</script>
<script>
  $.ajaxSetup({
   headers:{
     'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
   }
 });
  
  $(function(){
    /* UPDATE ADMIN PERSONAL INFO */
    $('#AdminInfoForm').on('submit', function(e){
      e.preventDefault();
      $.ajax({
       url:$(this).attr('action'),
       method:$(this).attr('method'),
       data:new FormData(this),
       processData:false,
       dataType:'json',
       contentType:false,
       beforeSend:function(){
         $(document).find('span.error-text').text('');
       },
       success:function(data){
        if(data.status == 0){
          $.each(data.error, function(prefix, val){
            $('span.'+prefix+'_error').text(val[0]);
          });
        }else{
          $('.admin_name').each(function(){
           $(this).html( $('#AdminInfoForm').find( $('input[name="name"]') ).val() );
         });
          $('.admin_bio').each(function(){
           $(this).html( $('#AdminInfoForm').find( $('textarea[name="bio"]') ).val() );
         });
          alert(data.msg);
        }
      }
    });
    });
    $(document).on('click','#change_picture_btn', function(){
      $('#admin_image').click();
    });
    $('#admin_image').ijaboCropTool({
      preview : '.admin_picture',
      setRatio:1,
      allowedExtensions: ['jpg', 'jpeg','png'],
      buttonsText:['CROP','QUIT'],
      buttonsColor:['#30bf7d','#ee5155', -15],
      processUrl:'{{ route("adminPictureUpdate") }}',
          // withCSRF:['_token','{{ csrf_token() }}'],
          onSuccess:function(message, element, status){
           alert(message);
         },
         onError:function(message, element, status){
          alert(message);
        }
      });
    $('#changePasswordAdminForm').on('submit', function(e){
     e.preventDefault();
     $.ajax({
      url:$(this).attr('action'),
      method:$(this).attr('method'),
      data:new FormData(this),
      processData:false,
      dataType:'json',
      contentType:false,
      beforeSend:function(){
        $(document).find('span.error-text').text('');
      },
      success:function(data){
        if(data.status == 0){
          $.each(data.error, function(prefix, val){
            $('span.'+prefix+'_error').text(val[0]);
          });
        }else{
          $('#changePasswordAdminForm')[0].reset();
          alert(data.msg);
        }
      }
    });
   });

  });
</script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script>
   //color picker with addon
   $('.my-colorpicker2').colorpicker()
 </script>
</body>
</html>
