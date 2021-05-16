@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap4-toggle/3.6.1/bootstrap4-toggle.min.js" integrity="sha512-bAjB1exAvX02w2izu+Oy4J96kEr1WOkG6nRRlCtOSQ0XujDtmAstq5ytbeIxZKuT9G+KzBmNq5d23D6bkGo8Kg==" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap4-toggle/3.6.1/bootstrap4-toggle.min.css" integrity="sha512-EzrsULyNzUc4xnMaqTrB4EpGvudqpetxG/WNjCpG6ZyyAGxeB6OBF9o246+mwx3l/9Cn838iLIcrxpPHTiygAA==" crossorigin="anonymous" /> -->
  <div class="content">
    <div class="container-fluid">
      <div class="container-tambah mb-4">

        @if (session('success'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="material-icons">close</i>
              </button>
              {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="material-icons">close</i>
            </button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
          </div>
        @endif

        <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#signupModal">
          <i class="material-icons">add</i>
          Tambah
        </button>

        <!-- <h2>{{ $notifikasiLampu }}</h2> -->

        <div class="modal fade" id="signupModal" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-signup" role="document">
            <div class="modal-content">
              <div class="card card-signup card-plain w-100">
                <div class="modal-header">
                  <h5 class="modal-title card-title">Tambah Benda</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <i class="material-icons">clear</i>
                  </button>
                </div>
                <div class="modal-body d-flex justify-content-center align-self-center w-100">                    
                      <form class="form" method="post" action="/home">
                        @csrf
                        <div class="card-body pr-4" style="min-width: 400px;">
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text"><i class="material-icons">add_circle</i></div>
                              </div>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Benda">
                            </div>
                          </div>

                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><i class="material-icons">format_list_bulleted</i></div>
                            </div>
                            <div class="dropdown">
                              <button class="btn btn-primary dropdown-toggle" type="button" id="jenis" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Masukkan Jenis Benda
                              <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu" aria-labelledby="jenis">
                                <li value="Lampu"><a class="dropdown-item" href="#">Lampu</a></li>
                                <li value="A/C"><a class="dropdown-item" href="#">A/C</a></li>
                                <li value="TV"><a class="dropdown-item" href="#">TV</a></li>
                                <li value="Kunci"><a class="dropdown-item" href="#">Kunci</a></li>
                                <li value="Gordyn"><a class="dropdown-item" href="#">Gordyn</a></li>
                              </ul>
                            </div>
                            <input type="hidden" id="dropdownJenis" class="form-control" name="jenis">
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><i class="material-icons">place</i></div>
                            </div>
                              <input type="text"class="form-control" id="lokasi" name="lokasi" placeholder="Masukkan Lokasi Benda" />
                          </div>
                        </div>

                        </div>
                      <div class="modal-footer justify-content-center">
                      <!-- <a href="#pablo" class="btn btn-primary btn-round">Tambah benda</a> -->
                      <button type="submit" class="btn btn-primary btn-round">Tambah benda</button>
                      </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">tungsten</i>
              </div>
              <p class="card-category">Jumlah Lampu</p>
              <h3 class="card-title">{{ $countTotalLampu }}
                <small>buah</small>
              </h3>
            </div>
            <div class="card-footer">
            <!-- <a href="#0" class="btn btn-primary">Tambah</a> -->
              <!-- <div class="stats">
                <i class="material-icons text-danger">warning</i>
                <a href="#pablo">Get More Space...</a>
              </div> -->

              
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">ac_unit</i>
              </div>
              <p class="card-category">Jumlah A/C</p>
              <h3 class="card-title">null</h3>
            </div>
            <div class="card-footer">
              <!-- <div class="stats">
                <i class="material-icons">date_range</i> Last 24 Hours
              </div> -->
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">tv</i>
              </div>
              <p class="card-category">Jumlah TV</p>
              <h3 class="card-title">null</h3>
            </div>
            <div class="card-footer">
              <!-- <div class="stats">
                <i class="material-icons">local_offer</i> Tracked from Github
              </div> -->
            </div>
          </div>
        </div>

        <!-- @foreach( $home as $thing)
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="fa fa-twitter"></i>
              </div>
              <p class="card-category">{{ $thing->thing }}</p>
              <h3 class="card-title">{{ $thing->thingType }}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">update</i> Just Updated
              </div>
            </div>
          </div>
        </div>
        @endforeach -->

      </div>
      <div class="row">

        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">Lampu</h4>
              <!-- <p class="card-category">New employees on 15th September, 2016</p> -->
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-warning">
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Ruangan</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                @foreach( $home as $thing)
                  <tr>
                    <td>{{ $thing->id }}</td>
                    <td>{{ $thing->thing }}</td>
                    <td>{{ $thing->room}}</td>
                    <td>
                    <div class="togglebutton">
                      <label>
                        <input 
                          type="checkbox"
                          data-id="{{ $thing->id }}" 
                          class="toggle-class" 
                          data-toggle="toggle"
                          data-onstyle="success"
                          data-offstyle="danger"
                          data-on="Hidup"
                          data-off="Mati"
                          data-size="sm"
                          {{ $thing->state ? 'checked' : '' }}
                          >
                          <span class="toggle"></span>
                      </label>
                    </div>
                        <!-- <input 
                          type="checkbox" 
                          data-id="{{ $thing->id }}" 
                          class="toggle-class" 
                          data-toggle="toggle"
                          data-onstyle="success"
                          data-offstyle="danger"
                          data-on="Hidup"
                          data-off="Mati"
                          data-size="sm"
                          {{ $thing->state ? 'checked' : '' }}
                        > -->
                    <!-- </div> -->
                        <!-- <a href="/mahasiswa/{{ $thing->id }}/edit" class="btn btn-success btn-sm">Edit</a> -->
                        <!-- <div class="togglebutton">
                          <label>
                            <input type="checkbox" name="toggle" id="toggle" checked="">
                              <span class="toggle"></span>
                          </label>
                        </div> -->
                        <!-- <div>


                          <livewire:toggle-button
                                  :model="$thing"
                                  field="state"
                                  key="{{ $thing->id }}" />
                        </div> -->

                        <!-- @livewire('toggle-button',[
                          'model' => $thing,
                          'field' => 'state',
                          'key'=> $thing->id
                        ]) -->


                          <!-- <form action="/mahasiswa/{{ $thing->id }}" method="post" class="d-inline">
                              @method('delete')
                              @csrf
                              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form> -->
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
    
    $(".dropdown-menu li a").click(function(){
      var selText = $(this).text();
      $(this).parents('.dropdown').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
      console.log('a1');
    });

    $('.dropdown-menu li').on('click', function(){
      $('#dropdownJenis').val($(this).attr("value"));
      console.log('a2');
    });

    $(function() {
      $('.toggle-class').change(function() {
        var state = $(this).prop('checked') == true ? 1 : 0;
        var id = $(this).data('id');
          $.ajax({
            type: "get",
            dataType: "json",
            url: "/updateThing",
            data: {'state': state, 'id': id},
            success: function(data){
              console.log(data.success);
            }
          });
      });
    });
  </script>
@endpush