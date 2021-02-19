@extends('index')
@section('css')
    @parent
        {!! Html::style('css/paper-bootstrap-wizard.css') !!}
    @stop
@section('konten')
<?php 
  use App\Http\Controllers\controlNotifMenu;
?>
<section class="content">
    <div class="row">
        <div class="col-sm-12">
            <!--      Wizard container        -->
            <div class="box box-primary wizard-container">
            <div class="box-body">
                <div class="wizard-card" data-color="orange" id="wizardProfile">
                    <form action="" method="">

                        <div class="wizard-header text-center">
                            <h3 class="wizard-title">Form Keluarkan barang</h3>
                            <p class="category">Masukkan keperluan, data barang, dan pembawa barang.</p>
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
                                        Barang
                                    </a>
                                </li>
                                <li>
                                    <a href="#account" data-toggle="tab">
                                        <div class="icon-circle">
                                            <i class="fa fa-truck"></i>
                                        </div>
                                        Pembawa
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
                            <div class="tab-pane databarang" id="about">
                                
                            </div>
                            <div class="tab-pane datapembawa" id="account">
                                
                            </div>
                            <div class="tab-pane" id="address">
                                <form id="formkeluar">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h5 class="info-text"> Keperluan? </h5>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Tujuan <small><code>*</code></small></label>
                                                <input name="tujuan" type="text" class="form-control tujuan" placeholder="5h Avenue" value="{{$data->tujuan}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Tamggal Kembali <small><code>*</code></small></label>
                                                <input name="tglkembali" type="date" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
        var urlbrg = url_local+"/kmb/public/barangkeluar/databarang/{{$id}}";
        var urlpem = url_local+"/kmb/public/barangkeluar/datapembawa/{{$id}}";
        var urlkeluar = url_local+"/kmb/public/barangkeluar/simpan/{{ $id }}";


        $('.databarang').load(urlbrg);
        $('.datapembawa').load(urlpem);

        $(".btn-finish").click(function(){
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            })

            var formData = new FormData($('#formkeluar')[0]);
            var type = "POST";
            var my_url = urlkeluar;

            $.ajax({
                type : type,
                url : my_url,
                data : formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function(){
                    
                },
                success: function(data){
                    console.log(data);
                    
                },
                error: function(data){
                    console.log(data);
                }
            });
        });
      });
    </script>
@stop