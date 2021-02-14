<table id="example1" class="table table-condensed table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Tujuan</th>
            <th>Keperluan</th>
            <th>Tanggal Keluar</th>
            <th>Jenis Barang</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @if (count($data) > 0)
        @foreach ($data as $d)
        <tr>
            <td>{{$i++}}</td>
            <td><a href="{{url('barangkeluar/'.$d->idkeluar)}}">{{$d->tujuan}}</a></td>
            <td>{{$d->keperluan}}</td>
            <td>{{$d->tgl}}</td>
            <td>{{$d->jenisbarang}}</td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="5">Belum ada pengeluaran barang</td>
        </tr>
        @endif
    </tbody>
    <tfoot>
        <tr>
            <th>#</th>
            <th>Tujuan</th>
            <th>Keperluan</th>
            <th>Tanggal Keluar</th>
            <th>Jenis Barang</th>
        </tr>
    </tfoot>
</table>