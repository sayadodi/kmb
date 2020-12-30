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
        @php
            $no = 1;
        @endphp
        @foreach ($data as $d)
        <tr>
            <td>{{ $no++ }}</td>
            <td><a href="{{ url('kirimbarang/'.$d->kodekirim) }}">{{ $d->nopo }}</a></td>
            <td>{{ $d->keperluan }}</td>
            <td>{{ $d->tglbuat }}</td>
            <td>{{ $d->tglkirim }}</td>
            <td>Mbak Rini</td>
            <td><span class="label label-success">{{ $d->statuskiriman }}</span></td>
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