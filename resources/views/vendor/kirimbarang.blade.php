@extends('index')
@section('konten')
<section class="content">
<div class="row">
	<div class="col-md-12">
		@include('include.flash_message')
	</div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step col-xs-3"> 
                    <a href="#step-1" type="button" class="btn btn-success btn-circle"><i class="fa fa-archive"></i></a>
                    <p><small>Data Barang</small></p>
                </div>
                <div class="stepwizard-step col-xs-3"> 
                    <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="fa fa-users"></i></a>
                    <p><small>Pembawa barang</small></p>
                </div>
                <div class="stepwizard-step col-xs-3"> 
                    <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="fa fa-gears"></i></a>
                    <p><small>Tools Tambahan</small></p>
                </div>
                <div class="stepwizard-step col-xs-3"> 
                    <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="fa fa-map-marker"></i></a>
                    <p><small>Kendaraan dan Tujuan</small></p>
                </div>
            </div>
        </div>
    
        <form role="form">
            <div class="panel panel-primary setup-content" id="step-1">
                <div class="panel-heading">
                    <h3 class="panel-title">Barang</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label">Nama barang</label>
                        <input maxlength="100" type="text" required="required" class="form-control" placeholder="Contoh : Lampu neon 90W" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Jumlah</label>
                        <input type="number" required="required" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Satuan</label>
                        <input maxlength="100" type="text" required="required" class="form-control" placeholder="Contoh : LOT, EA, Dll" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Deskripsi</label>
                        <input maxlength="100" type="text" required="required" class="form-control" placeholder="Contoh: Lebar 22mm x 33mm" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Gambar barang</label>
                        <input type="file" required="required" class="form-control" placeholder="" />
                    </div>
                    <div class="table-responsive">
					
				</div>
                    <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                </div>
                
            </div>
            
            <div class="panel panel-primary setup-content" id="step-2">
                <div class="panel-heading">
                    <h3 class="panel-title">Destination</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label">Company Name</label>
                        <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Company Address</label>
                        <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address" />
                    </div>
                    <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                </div>
            </div>
            
            <div class="panel panel-primary setup-content" id="step-3">
                <div class="panel-heading">
                    <h3 class="panel-title">Schedule</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label">Company Name</label>
                        <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Company Address</label>
                        <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address" />
                    </div>
                    <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                </div>
            </div>
            
            <div class="panel panel-primary setup-content" id="step-4">
                <div class="panel-heading">
                    <h3 class="panel-title">Cargo</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label">Company Name</label>
                        <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Company Address</label>
                        <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address" />
                    </div>
                    <button class="btn btn-success pull-right" type="submit">Finish!</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection