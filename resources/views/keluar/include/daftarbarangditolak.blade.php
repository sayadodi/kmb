<div class="table-responsive">
    <table id="example1" class="table table-condensed table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Spesifikasi</th>
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @if (count($tolak) > 0)
            @foreach ($tolak as $d)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$d->namabarang}}</td>
                <td>{{$d->satuan}} {{$d->jumlah}}</td>
                <td>{{$d->spesifikasi}}</td>
                <td>
                    <img src="{{asset('gambar/'.$d->fotobarang)}}" alt="" width="70" height="70">
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="5">Tidak ada barang yang ditolak</td>
            </tr>
            @endif
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Spesifikasi</th>
                <th>Gambar</th>
            </tr>
        </tfoot>
    </table>
    
</div>