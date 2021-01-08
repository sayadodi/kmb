<div id="loadingbarang" align="center">
    Proses...
</div>
<div id="barang">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="table-barang" class="table table-condensed table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nama barang</th>
                    <th>Jumlah</th>
                    <th>Gambar</th>
                    <th>Dokumen</th>
                    <th>Jenis Barang</th>
                    <th>Keterangan</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $i = 1;
                @endphp
                @if(isset($data))
                    @foreach($data as $d)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $d->namabarang }}</td>
                        <td>{{ $d->jumlahbarang }} {{ $d->satuan }}</td>
                        <td></td>
                        <td></td>
                        <td>{{ $d->jenisbarang }}</td>
                        <td>{{ $d->keterangan }}</td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8">Tidak ada data!</td>
                    </tr>
                @endif
                </tbody>
                </table>
            </div>
        </div>
    </row>
</div>

<script>
    onReady(function() {
        setVisible('#barang', true);
        setVisible('#loadingbarang', false);
    });
</script>