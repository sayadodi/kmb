<div id="loadingkendaraan" align="center">
    Proses...
</div>
<div id="kendaraan" class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="table-ikut" class="table table-condensed table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Jenis</th>
                        <th>Nama</th>
                        <th>Plat</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $i = 1;
                @endphp
                @if(!empty($data))
                    @foreach($data as $d)
                        <tr>
                            <td><?=$i++?></td>
                            <td>{{$d->jeniskendaraan}}</td>
                            <td>{{$d->namakendaraan}}</td>
                            <td>{{$d->plat}}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Tidak ada data!</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    onReady(function() {
        setVisible('#kendaraan', true);
        setVisible('#loadingkendaraan', false);
    });
</script>