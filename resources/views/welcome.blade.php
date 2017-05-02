@include('layout.header')
<body>
@include('layout.sidebar')
<div class="container-fluid">
    @include('layout.logo')
    @include('layout.statsbar')
    <div class="row middle">
        <div class="col-md-1"></div>
        <div class="col-md-10" style="text-align: center;">
            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="col-md-12" class="pull-right">
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-12" class="pull-left">
                    <div id="map"></div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    <div class="row" style="margin-top: 50px;">
        <div class="col-md-1"></div>
        <div class="col-md-10" style="text-align: center;">
            <div class="mybar col-md-12">
                <div class="col-md-5" style="text-align: center; width:47.5%;">
                    <div class="Labels col-md-12">BLOCK DETAILS</div>
                    <div class="col-md-12">
                        <div class="col-md-6 pull-left blockdetails">
                            <div class="row">
                                <div class="col-md-2 text-right orange">{!! $blockstoday !!}</div>
                                <div class="col-md-10 text-left">Blocks Today</div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 text-right purple">{!! number_format($avgblocktime,'1','.','') !!}</div>
                                <div class="col-md-10 text-left">Avg Block Time</div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 text-right babyBlue">{!! $blockreward / 2 !!}</div>
                                <div class="col-md-10 text-left">Block Award</div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 text-right purple">{!! $daytilldrop !!}</div>
                                <div class="col-md-10 text-left">Days to Drop</div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 text-right babyBlue">{!! $nextbreward / 2 !!}</div>
                                <div class="col-md-10 text-left">Next Block Award</div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 text-right purple">{!! number_format($avgrewardfreq,'2','.',',') !!}</div>
                                <div class="col-md-10 text-left">Reward Freq</div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 text-right babyBlue">{!! number_format($avgblocks,'2','.',',') !!}</div>
                                <div class="col-md-10 text-left">Avg Block Awards</div>
                            </div>
                        </div>
                        <div class="col-md-6 pull-left no-padding">
                            <canvas id="barChart"></canvas><br>
                            Blocks vs. Spec last 6 days
                        </div>
                    </div>
                </div>
                <div class="col-md-2" style="text-align: center; width: 5%">
                    <div class="vr2" style="display: inline-block;">&nbsp;</div>
                </div>
                <div class="col-md-5" style="text-align: center; width: 47.5%">
                    <div class="Labels col-md-12">NODES BY COUNTRY</div>
                    <div class="col-md-12">
						<?php $i = 1; ?>
                        @foreach ($country as $key => $value)
                            @if ($i <= 4)
                                <div class="col-md-3">
                                    <div style="height: 100px; width: 100px; margin: auto;">
                                        <canvas id="do{!! $i !!}Chart" width="400" height="400"></canvas>
                                        <br>
                                        {!! $value['country_name'] !!}
                                    </div>
                                </div>
                            @endif
							<?php $i++; ?>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    @include('layout.footer')
    <div class="modal fade" id="mainModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    </div>
</div>
@include('mlgData',['type' => '30day'])
@include('layout.doughnutchart')
@include('layout.barchart')
<script>
    $(document).ready(function () {
        $('#myTable').DataTable({
            "order": [[4, "desc"]]
        });
    });
</script>
@include('layout.map')
@include('layout.analytics')
</body>
</html>
