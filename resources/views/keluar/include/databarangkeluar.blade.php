<div id="loading" align="center">
    Proses...
</div>
<div id="kontennya">
<table class="table no-margin tabled">
    <thead>
        <tr>
            <th>#</th>
            <th>Keperluan</th>
            <th>Status Barang</th>
            <th>Status</th>
            <th>Tanggal Pengeluaran</th>
        </tr>
    </thead>
    <tbody>
    @if(count($data) > 0)
        @foreach ($data as $d)
        <tr>
            <td></td>
            <td><a href="{{ url('mintakeluar/'.$d->idkeluar) }}">{{ $d->keperluan }}</a></td>
            <td>{{ $d->jenisbarang }}</td>
            <td>{{ $d->status }}</td>
            <td>
                @if (empty($d->tgl))
                    Belum diatur
                @else
                    {{ $d->tgl }}
                @endif
            </td>
        </tr>
        @endforeach
        @else
            <tr>
                <td colspan="5">Tidak ada data</td>
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