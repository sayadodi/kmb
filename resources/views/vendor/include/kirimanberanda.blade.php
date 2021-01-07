<div id="loadingb" align="center">
    Proses...
</div>
<div id="kontennyab">
<table class="table no-margin tabled">
    <thead>
        <tr>
            <th>#</th>
            <th>No Pesanan</th>
            <th>Nama Pengiriman</th>
            <th>Tanggal Buat</th>
            <th>Tanggal Kirim</th>
            <th>Tujuan</th>
            <th>Gudang</th>
            <th>Pos</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @if(count($data) > 0)
        @foreach ($data as $d)
        <tr>
            @if ($d->statuskiriman == "Mengatur")
                <td><i class="fa fa-gears text-info"></i></td>
            @elseif($d->statuskiriman == "Meminta")
                <td><i class="fa fa-clock-o text-muted"></i></td>
            @elseif($d->statuskiriman == "Ditolak")
                <td><i class="fa fa-close text-danger"></i></td>
            @elseif($d->statuskiriman == "Diterima")
                <td><i class="fa fa-check text-success"></i></td>
            @else
                <td></td>
            @endif
            <td><a href="{{ url('kirimbarang/'.$d->kodekirim) }}">{{ $d->nopo }}</a></td>
            <td>{{ $d->keperluan }}</td>
            <td>{{ $d->tglbuat }}</td>
            <td>{{ $d->tglkirim }}</td>
            <td>Mbak Rini</td>
            <td>{{ $d->statusgudang }}</td>
            <td>{{ $d->statuspos }}</td>
            <td>
                @if ($d->statusgudang == "Baru")
                    <span class="label label-info">{{ $d->statuskiriman }}</span>
                @elseif($d->statusgudang == "Meminta")
                    <span class="label label-default">{{ $d->statuskiriman }}</span>
                @elseif($d->statusgudang == "Ditolak")
                    <span class="label label-danger">{{ $d->statuskiriman }}</span>
                @elseif($d->statusgudang == "Diterima")
                    <span class="label label-success">{{ $d->statuskiriman }}</span>
                @else
                    <td></td>
                @endif
               
            </td>
        </tr>
        @endforeach
        @else
            <tr>
                <td colspan="9">Tidak ada data</td>
            </tr>
        @endif
    </tbody>
</table>
</div>

<script>
    onReady(function() {
        setVisible('#kontennyab', true);
        setVisible('#loadingb', false);
    });
</script>