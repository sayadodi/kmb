<div class="box box-primary">
    <div class="box-header with-border">
    <h3 class="box-title">Hasil Scan</h3>

    <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
    </div>
    <div class="box-body">
        <h5>Daftar Pembawa</h5>
        <hr>
        <div class="table-responsive">
            <table id="table-ikut" class="table table-condensed table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Identitas</th>
                        <th>Nama</th>
                        <th>Foto</th>
                        <th>Kontak</th>
                        <th>Alamat</th>
                        <th>Jabatan</th>
                        <th>Pass B</th>
                        <th>Pass A</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $i = 1;
                @endphp
                @if(!empty($tamu))
                    @foreach($tamu as $d)
                        <tr>
                            <td><?=$i++?></td>
                            <td>{{$d->pengenal}} - {{$d->nopengenal}}</td>
                            <td>{{$d->namatamu}}</td>
                            <td>
                            @if(empty($d->fototamu))
                                <button class="btn btn-primary btn-xs aturikut" data-id="{{$d->iddetailtamu}}">Atur</button>
                            @else
                                <img src="{{asset('tamu/'.$d->fototamu)}}" alt="" width="70" height="70">
                            @endif
                            </td>
                            <td>{{$d->notlptamu}}</td>
                            <td>{{$d->alamattamu}}</td>
                            <td>{{$d->jabatan}}</td>
                            <td><b>B</b>{{$d->nopass}}</td>
                            <td>
                            <div class="form-group row">
                                <div class="col-md-1 text-right"><b>A</b>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="" id="passa" placeholder="09" class="form-control passa" data-kode="{{$d->iddetailtamu}}">
                                </div>
                            </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="9">Tidak ada data!</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        <h5>Kendaraan</h5>
        <hr>
        <div class="table-responsive">
            <table id="table-ikut" class="table table-condensed table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Jenis</th>
                        <th>Nama</th>
                        <th>Plat</th>
                        <th>Gate Pass</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $i = 1;
                @endphp
                @if(!empty($kend))
                    @foreach($kend as $e)
                        <tr>
                            <td><?=$i++?></td>
                            <td>{{$e->jeniskendaraan}}</td>
                            <td>{{$e->namakendaraan}}</td>
                            <td>{{$e->plat}}</td>
                            <td>
                            <div class="form-group row">
                                <div class="col-md-1 text-right"><b>A</b>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="" id="gatepass" placeholder="09" class="form-control gatepass" data-kode="">
                                </div>
                            </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">Tidak ada data!</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
