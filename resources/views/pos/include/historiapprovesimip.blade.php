<?php 
  use App\Http\Controllers\controlNotifMenu;
?>
<p class="lead">Simip: </p>
<ul class="timeline timeline-inverse">
    @if(empty($kiriman->statuspossimip))
        <li>
            <i class="fa fa-user bg-grey"></i>
            <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 00-00-000</span>

                <h3 class="timeline-header no-border"><a href="#">Pos </a> Belum menerima
                </h3>
            </div>
        </li>
    @elseif($kiriman->statuspossimip == "Diterima")
        <li>
            <i class="fa fa-user bg-aqua"></i>
            <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> {{ $kiriman->tglsimip }}</span>

                <h3 class="timeline-header no-border"><a href="#">Pos</a> Telah Menerima Kiriman
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

    @if (empty($kiriman->k3))
        
    @else
        <li>
            <i class="fa fa-user bg-aqua"></i>

            <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                <h3 class="timeline-header no-border"><a href="#">K3</a> Sudah Approve
                </h3>
            </div>
        </li>
    @endif

    @if (empty($kiriman->smanager))
        <li>
            <i class="fa fa-user bg-grey"></i>

            <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 00-00-0000</span>

                <h3 class="timeline-header no-border"><a href="#">Nanager Setempat</a> Belum Approve
                </h3>
            </div>
        </li>
    @else
        <li>
            <i class="fa fa-user bg-aqua"></i>

            <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                <h3 class="timeline-header no-border"><a href="#">Manager Setempat</a> Sudah Approve
                </h3>
            </div>
        </li>
    @endif
</ul>