<?php 
  use App\Http\Controllers\controlNotifMenu;
?>
<p class="lead">Approver: </p>
<ul class="timeline timeline-inverse">
    @if($kiriman->statuskiriman == "Diterima Gudang")
        <li>
            <i class="fa fa-user bg-grey"></i>
            <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 00-00-000</span>

                <h3 class="timeline-header no-border"><a href="#">Pos </a> Belum menerima
                </h3>
            </div>
        </li>
    @elseif($kiriman->statuskiriman == "Diterima Pos" || $kiriman->statuskiriman == "Proses Approve")
        <li>
            <i class="fa fa-user bg-aqua"></i>
            <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 00-00-000</span>

                <h3 class="timeline-header no-border"><a href="#">Pos []</a> Telah Menerima Kiriman
                </h3>
            </div>
        </li>
    @else

    @endif
    @foreach($pengaturan as $a)
        @if(controlNotifMenu::sudahapprove($a->kodejabatan,$idapprove) < 1)
            <li>
                <i class="fa fa-user bg-grey"></i>

                <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                    <h3 class="timeline-header no-border"><a href="#">Pak ini</a> Belum approve
                    </h3>
                </div>
            </li>
        @else
            <li>
                <i class="fa fa-user bg-aqua"></i>

                <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                    <h3 class="timeline-header no-border"><a href="#">Pak ini</a> Sudah approve
                    </h3>
                </div>
            </li>
        @endif
    @endforeach
    <li>
        <i class="fa fa-user bg-aqua"></i>

        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

            <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
            </h3>
        </div>
    </li>
    <li>
        <i class="fa fa-user bg-aqua"></i>

        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

            <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
            </h3>
        </div>
    </li>
</ul>