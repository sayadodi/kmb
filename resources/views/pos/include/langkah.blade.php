<table class="table">
    <tr>
        <th style="width:50%">Atur Simip:</th>
        <td>
            @if(empty($kiriman->areakhusus))
                Simip : <b>[<i class="fa fa-close text-danger"></i>]</b>
            @else
                Simip : <b>[<i class="fa fa-check text-success"></i>]</b>
            @endif
        </td>
    </tr>
    <tr>
        <th>Masukkan Foto dan Nopass</th>
        <td>
            @if($tamu > 0)
                Nopass : <b>[<span class="text-danger">{{$tamu}}</span>]</b>
            @else
                Nopass : <b>[<i class="fa fa-check text-success"></i>]</b>
            @endif
            <br>
            @if($foto > 0)
                Foto : <b>[<span class="text-danger">{{$foto}}</span>]</b>
            @else
                Foto : <b>[<i class="fa fa-check text-success"></i>]</b>
            @endif

        </td>
    </tr>
    <tr>
        <th>Masukkan Gatepass:</th>
        <td>
            @if($kend > 0)
                Gatepass <b>[<span class="text-danger">{{$kend}}</span>]</b>
            @else
                Gatepass <b>[<i class="fa fa-check text-success"></i>]</b>
            @endif
        </td>
    </tr>
</table>