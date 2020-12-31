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
            <th>Gudang</th>
            <th>Pos</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $d)
        <tr>
            @if ($d->statuskiriman == "Mengatur")
                <td><i class="fa fa-gears text-info"></i></td>
            @elseif($d->statuskiriman == "Meminta")
                <td><i class="fa fa-send text-muted"></i></td>
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
    </tbody>
</table>
</div>

<script>
    function onReady(callback) {
        var intervalId = window.setInterval(function() {
            if (document.getElementsByTagName('body')[0] !== undefined) {
            window.clearInterval(intervalId);
            callback.call(this);
            }
        }, 1000);
    }

    function setVisible(selector, visible) {
        document.querySelector(selector).style.display = visible ? 'block' : 'none';
    }

    onReady(function() {
        setVisible('#kontennya', true);
        setVisible('#loading', false);
    });
</script>