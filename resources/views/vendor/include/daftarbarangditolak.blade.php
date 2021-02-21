<div class="table-responsive">
    <table id="example1" class="table table-condensed table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>No PO</th>
                <th>Keperluan</th>
                <th>Tanggal Kirim</th>
                <th>Nama Barang</th>
                <th>Alasan</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @if (count($tolak) > 0)
            @foreach ($tolak as $d)
            <tr>
                <td><input type="checkbox" name="kdbrg" class="kdbrg" data-kode="{{ $d->iddetailkirim }}"></td>
                <td>{{$d->nopo}}</td>
                <td>{{$d->keperluan}}</td>
                <td>{{$d->tglkirim}}</td>
                <td>{{$d->namabarang}}</td>
                <td>{{$d->alasantolak}}</td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="7">Tidak ada barang yang ditolak</td>
            </tr>
            @endif
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>No PO</th>
                <th>Keperluan</th>
                <th>Tanggal Kirim</th>
                <th>Nama Barang</th>
                <th>Alasan</th>
            </tr>
        </tfoot>
    </table>
    
</div>