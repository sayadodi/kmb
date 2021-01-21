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
                <span class="time"><i class="fa fa-clock-o"></i> {{ $kiriman->tglmasuk }}</span>

                <h3 class="timeline-header no-border"><a href="#">Pos [{{ controlNotifMenu::carinamakaryawan($kiriman->pos) }}]</a> Telah Menerima Kiriman
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
                    <span class="time"><i class="fa fa-clock-o"></i> 00-00-0000</span>

                    <h3 class="timeline-header no-border"><a href="#">{{ controlNotifMenu::carinamajabatan($a->kodejabatan) }}</a> Belum approve
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
    @if (empty($kiriman->lobby))
        <li>
            <i class="fa fa-user bg-grey"></i>

            <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 00-00-0000</span>

                <h3 class="timeline-header no-border"><a href="#">Lobby</a> Belum Approve
                </h3>
            </div>
        </li>
    @else
        <li>
            <i class="fa fa-user bg-aqua"></i>

            <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                <h3 class="timeline-header no-border"><a href="#">Lobby</a> Sudah Approve
                </h3>
            </div>
        </li>
    @endif
    
    @if (empty($kiriman->gudang))
        <li>
            <i class="fa fa-user bg-grey"></i>

            <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 00-00-0000</span>

                <h3 class="timeline-header no-border"><a href="#">Gudang</a> Belum Approve
                </h3>
            </div>
        </li>
    @else
        <li>
            <i class="fa fa-user bg-aqua"></i>

            <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                <h3 class="timeline-header no-border"><a href="#">Gudang</a> Sudah Approve
                </h3>
            </div>
        </li>
    @endif
</ul>