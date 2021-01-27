@extends('index')
@section('css')
    @parent
        {!! Html::style('css/paper-bootstrap-wizard.css') !!}
    @stop
@section('konten')
<section class="content">
    <div class="row">
        <div class="col-sm-12">
            <!--      Wizard container        -->
            <div class="box box-primary wizard-container">
            <div class="box-body">
                <div class="wizard-card" data-color="orange" id="wizardProfile">
                    <form action="" method="">

                        <div class="wizard-header text-center">
                            <h3 class="wizard-title">Form Simip</h3>
                            <p class="category">Masukkan data diri dan keperluan anda.</p>
                        </div>

                        <div class="wizard-navigation">
                            <div class="progress-with-circle">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 21%;"></div>
                            </div>
                            <ul>
                                <li>
                                    <a href="#about" data-toggle="tab">
                                        <div class="icon-circle">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        Data diri
                                    </a>
                                </li>
                                <li>
                                    <a href="#account" data-toggle="tab">
                                        <div class="icon-circle">
                                            <i class="fa fa-truck"></i>
                                        </div>
                                        Kendaraan
                                    </a>
                                </li>
                                <li>
                                    <a href="#address" data-toggle="tab">
                                        <div class="icon-circle">
                                            <i class="fa fa-map"></i>
                                        </div>
                                        Keperluan
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane tamu" id="about">
                                
                            </div>
                            <div class="tab-pane kendaraan" id="account">
                                
                            </div>
                            <div class="tab-pane" id="address">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h5 class="info-text"> Kepentingan? </h5>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Bertemu dengan <small><code>*</code></small></label>
                                            <input type="text" class="form-control" placeholder="5h Avenue">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Dengan janji <small><code>*</code></small></label><br>
                                            <select name="country" class="form-control">
                                                <option value="Ya"> Ya </option>
                                                <option value="Tidak"> Tidak </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Kepentingan <small><code>*</code></small></label>
                                            <input type="text" class="form-control" placeholder="New York...">
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="wizard-footer">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-fill btn-warning btn-wd' name='next' value='Next' />
                                <input type='button' class='btn btn-finish btn-fill btn-warning btn-wd' name='finish' value='Finish' />
                            </div>

                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Previous' />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>

            </div> <!-- wizard container -->
        </div>
    </div>
</section>
@endsection
@section('scripts')
    @parent
    {!! Html::script('js/jquery.bootstrap.wizard.js')!!}
    {!! Html::script('js/paper-bootstrap-wizard.js')!!}
    {!! Html::script('js/jquery.validate.min.js')!!}
    {!! Html::script('js/fungsiloading.js')!!}

    <script>
      $(document).ready(function(){
        var url_local = window.location.protocol+'//'+window.location.host;
        var urltamu = url_local+"/kmb/public/daftartamu/{{$id}}";
        var urlkend = url_local+"/kmb/public/daftarkend/{{$id}}";

        $('.tamu').load(urltamu);
        $('.kendaraan').load(urlkend);
      });
    </script>
@stop