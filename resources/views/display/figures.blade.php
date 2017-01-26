@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h2>Collection - {{$total}} figures</h2>
                <h3>1/8 Scale - {{$amount18[0]->count}} figures</h3>
                <div class="row">
                    <?php $x=1; ?>
                    @foreach($scale18 as $figure)
                        <div class="col-md-4">
                            <div class="collection-panel panel-default ">
                              <div class="panel-body">
                                <img class="img-responsive" src="/images/{{$figure->url}}.jpg">
                                <h3 class="collection-title">{{$figure->name}}</h3>
                              </div>
                            </div>
                        </div>
                        <?php
                            if ($x%3==0) {
?>
                            </div>
                            <div class="row">
<?php                            
                            }
                            $x++;
                        ?>
                    @endforeach
                </div>
                <!-- 1/7 scales -->
                <h3>1/7 Scale - {{$amount17[0]->count}} figures</h3>
                <div class="row">
                    <?php $x=1; ?>
                    @foreach($scale17 as $figure)
                        <div class="col-md-4">
                            <div class="collection-panel panel-default ">
                              <div class="panel-body">
                                <img class="img-responsive" src="/images/{{$figure->url}}.jpg">
                                <h3 class="collection-title">{{$figure->name}}</h3>
                              </div>
                            </div>
                        </div>
                        <?php
                            if ($x%3==0) {
?>
                            </div>
                            <div class="row">
<?php                            
                            }
                            $x++;
                        ?>
                    @endforeach
                </div>
                <!-- 1/6 scales -->
                <h3>1/6 Scale - {{$amount16[0]->count}} figures</h3>
                <div class="row">
                    <?php $x=1; ?>
                    @foreach($scale16 as $figure)
                        <div class="col-md-4">
                            <div class="collection-panel panel-default ">
                              <div class="panel-body">
                                <img class="img-responsive" src="/images/{{$figure->url}}.jpg">
                                <h3 class="collection-title">{{$figure->name}}</h3>
                              </div>
                            </div>
                        </div>
                        <?php
                            if ($x%3==0) {
?>
                            </div>
                            <div class="row">
<?php                            
                            }
                            $x++;
                        ?>
                    @endforeach
                </div>
                <!-- Nendoroids -->
                 <h3>Nendoroids - {{$amountnendos[0]->count}} figures</h3>
                <div class="row">
                <?php $x=1; ?>
                @foreach($nendos as $figure)
                    <div class="col-md-4">
                        <div class="collection-panel panel-default ">
                          <div class="panel-body">
                            <img class="img-responsive" src="/images/{{$figure->url}}.jpg">
                            <h3 class="collection-title">{{$figure->name}}</h3>                            
                          </div>
                        </div>
                    </div>
                    <?php
                        if ($x%3==0) {
?>
                        </div>
                        <div class="row">
<?php                            
                        }
                        $x++;
                    ?>
                @endforeach
                </div>
                <!-- Nendoroid Co-de -->
                 <h3>Nendoroid Co-des - {{$amountnendocodes[0]->count}} figures</h3>
                <div class="row">
                <?php $x=1; ?>
                @foreach($nendocodes as $figure)
                    <div class="col-md-4">
                        <div class="collection-panel panel-default ">
                          <div class="panel-body">
                            <img class="img-responsive" src="/images/{{$figure->url}}.jpg">
                            <h3 class="collection-title">{{$figure->name}}</h3>                            
                          </div>
                        </div>
                    </div>
                    <?php
                        if ($x%3==0) {
?>
                        </div>
                        <div class="row">
<?php                            
                        }
                        $x++;
                    ?>
                @endforeach
                </div>   
                 <!-- Nendoroid Petites -->
                 <h3>Nendoroid Petites - {{$amountnendopetites[0]->count}} figures</h3>
                <div class="row">
                <?php $x=1; ?>
                @foreach($nendopetites as $figure)
                    <div class="col-md-4">
                        <div class="collection-panel panel-default ">
                          <div class="panel-body">
                            <img class="img-responsive" src="/images/{{$figure->url}}.jpg">
                            <h3 class="collection-title">{{$figure->name}}</h3>                            
                          </div>
                        </div>
                    </div>
                    <?php
                        if ($x%3==0) {
?>
                        </div>
                        <div class="row">
<?php                            
                        }
                        $x++;
                    ?>
                @endforeach
                </div>                                     
                <!-- Rest -->
                 <h3>Other - {{$amountnendos[0]->count}} figures</h3>
                <div class="row">
                <?php $x=1; ?>
                @foreach($figures as $figure)
                    <div class="col-md-4">
                        <div class="collection-panel panel-default ">
                          <div class="panel-body">
                            <img class="img-responsive" src="/images/{{$figure->url}}.jpg">
                            <h3 class="collection-title">{{$figure->name}}</h3>                            
                          </div>
                        </div>
                    </div>
                    <?php
                        if ($x%3==0) {
?>
                        </div>
                        <div class="row">
<?php                            
                        }
                        $x++;
                    ?>
                @endforeach
                </div>                                
                <!--<p>Sometimes I fail at building model kits properly on twitch, you can find me at <a href=”http://www.twitch.tv/figurerant/profile”>twitch.tv/figurerant</a></p>-->
        </div>
        <div class="col-md-2">
            <p>
                @include('display.rightsidebar')
            </p>
        </div>

    </div>
</div>
@endsection