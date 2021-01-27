<div id="loading" align="center">
    Proses...
</div>
<div id="kontennya">
<table class="table no-margin tabled">
    <thead>
        <tr>
            <th>#</th>
            <th>No Pesanan</th>
            <th>Nama Pengiriman</th>
            <th>Tanggal Buat</th>
            <th>Tanggal Kirim</th>
            <th>Tujuan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
    @if(count($data) > 0)
        @foreach ($data as $d)
        <tr>
            @if ($d->statuskiriman == "Mengatur")
                <td><i class="fa fa-gears text-info"></i></td>
            @elseif($d->statuskiriman == "Meminta Gudang")
                <td><i class="fa fa-clock-o text-muted"></i></td>
            @elseif($d->statuskiriman == "Ditolak Gudang")
                <td><i class="fa fa-close text-danger"></i></td>
            @elseif($d->statuskiriman == "Diterima Gudang")
                <td><i class="fa fa-check text-success"></i></td>
            @elseif($d->statuskiriman == "Diterima Pos")
                <td><i class="fa fa-shield text-primary"></i></td>
            @elseif($d->statuskiriman == "Proses Approve")
                <td><i class="fa fa-spinner text-primary"></i></td>
            @else
                <td></td>
            @endif
            <td><a href="{{ url('kirimbarang/po/'.$d->kodekirim) }}">{{ $d->nopo }}</a></td>
            <td>{{ $d->keperluan }}</td>
            <td>{{ $d->tglbuat }}</td>
            <td>
                @if(empty($d->tglkirim))
                    Belum diatur
                @else
                    {{$d->tglkirim}}
                @endif
            </td>
            <td>Mbak Rini</td>
            <td>
                @if ($d->statuskiriman == "Mengatur")
                    <span class="label label-info">{{ $d->statuskiriman }}</span>
                @elseif($d->statuskiriman == "Meminta Gudang")
                    <span class="label label-default">{{ $d->statuskiriman }}</span>
                @elseif($d->statuskiriman == "Ditolak Gudang")
                    <span class="label label-danger">{{ $d->statuskiriman }}</span>
                @elseif($d->statuskiriman == "Diterima Gudang")
                    <span class="label label-success">{{ $d->statuskiriman }}</span>
                @elseif($d->statuskiriman == "Diterima Pos")
                    <span class="label label-primary">{{ $d->statuskiriman }}</span>
                @elseif($d->statuskiriman == "Proses Approve")
                    <span class="label label-primary">{{ $d->statuskiriman }}</span>
                @else
                    
                @endif
            </td>
        </tr>
        @endforeach
        @else
            <tr>
                <td colspan="7">Tidak ada data</td>
            </tr>
        @endif
    </tbody>
</table>
</div>

<script>
    onReady(function() {
        setVisible('#kontennya', true);
        setVisible('#loading', false);
    });
</script>