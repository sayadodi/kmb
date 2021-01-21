@if($kiriman->statuskiriman == "Diterima Gudang")
    <button type="button" class="btn btn-success pull-right konfirmasikiriman"><i class="fa fa-credit-card"></i> Terima</button>
@elseif($kiriman->statuskiriman == "Diterima Pos")
    <span class="label label-success pull-right"><i class="fa fa-clock-o"></i> Menunggu Approver</span>
@endif
