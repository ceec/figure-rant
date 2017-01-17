@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h1>AmiAmi Pre-owned Filter Link Generator</h1>

            <h3>Filter by manufacturer</h3>
            <select id="manufacturer">
                <option>Manufacturer</option>
                <option value="Alter">Alter</option>
                <option value="ALPHAMAX">ALPHAMAX</option>
                <option value="AmiAmi">AmiAmi</option>
                <option value="Bandai">Bandai</option>
                <option value="Banpresto">Banpresto</option>
                <option value="Dive">Dive</option>
                <option value="FREEing">FREEing</option>
                <option value="FuRyu">FuRyu</option>                            
                <option value="Good%20Smile%20Company">Good Smile Company</option>
                <option value="Griffon%20Enterprises">Griffon Enterprises</option>
                <option value="HotToys">HotToys</option>    
                <option value="Kaiyodo">Kaiyodo</option>
                <option value="Konami">Konami</option>    
                <option value="Kotobukiya">Kotobukiya</option>
                <option value="MAX%20Factory">MAX Factory</option>    
                <option value="Medicom%20Toy">Medicom Toy</option>
                <option value="Medicos%20Entertainment">Medicos Entertainment</option>
                <option value="MegaHouse">MegaHouse</option>
                <option value="Movic">Movic</option>  
                <option value="Native">Native</option>
                <option value="OrchidSeed">OrchidSeed</option>  
                <option value="SEGA">SEGA</option>
                <option value="Square%20Enix">Square Enix</option>
                <option value="Taito">Taito</option>
                <option value="WAVE">WAVE</option>
                <option value="Yamato">Yamato</option>                               
            </select>

            <select id="pageamount-manu">
                <option value="70">70</option>
                <option value="125">125</option>
                <option value="200">200</option>
            </select>

            <button class="btn btn-primary" id="generate-manu">Generate Link</button>
            <br><br>
            <div id="link-manu"></div>
            <br><br>

            <h3>Filter by product line</h3>
            <select id="product-line">
                <option>Product Line</option>
                <option value="BEACH+QUEENS">Beach Queens</option>
                <option value="Excellent%20Model">Excellent Model</option>
                <option value="figma">figma</option>
                <option value="Figuarts%20ZERO">Figuarts ZERO</option>
                <option value="Ichiban%20Kuji">Ichiban Kuji</option>
                <option value="Mameshiki">Mameshiki</option>
                <option value="Nendoroid">Nendoroid</option>
                <option value="Portrait.Of.Pirates">Portrait.Of.Pirates</option>                            
                <option value="Real%20Action%20Heroes">Real Action Heroes</option>
                <option value="Revoltech">Revoltech</option>
                <option value="ROBOT%20Damashii">ROBOT Damashii</option>    
                <option value="Saint%20Cloth%20Myth">Saint Cloth Myth</option>
                <option value="S.H.%20Figuarts">S.H. Figuarts</option>    
                <option value="Super%20Action%20Statue">Super Action Statue</option>
                <option value="Tamashii%20Web">Tamashii Web</option>                            
            </select>

            <select id="pageamount-pl">
                <option value="70">70</option>
                <option value="125">125</option>
                <option value="200">200</option>
            </select>

            <button class="btn btn-primary" id="generate-pl">Generate Link</button>            
            
           
            <br><br>            
             <div id="link-pl"></div>
   
        </div>
        <div class="col-md-2">
            <p>
                @include('display.rightsidebar')
            </p>
        </div>

    </div>
</div>
<script>
    //generate the link filtering by manufacturer
    $('body').on('click','#generate-manu', function() {
        var manu = $('#manufacturer').val();
        var friendlyName = $('#manufacturer option:selected').text();
        var pageAmount = $('#pageamount-manu').val();    

        $('#link-manu').html('<a href="http://slist.amiami.com/top/search/list3?s_condition_flg=1&s_sortkey=preowned&s_maker='+manu+'&pagemax='+pageAmount+'" target="_blank">AmiAmi Pre-owned - '+friendlyName+'</a>');
    });

    //generate the link filtering by product line
    $('body').on('click','#generate-pl', function() {
        var productLine = $('#product-line').val();
        var friendlyName = $('#product-line option:selected').text();
        var pageAmount = $('#pageamount-pl').val();    

        $('#link-pl').html('<a href="http://slist.amiami.com/top/search/list3?s_condition_flg=1&s_sortkey=preowned&s_seriestitle='+productLine+'&pagemax='+pageAmount+'" target="_blank">AmiAmi Pre-owned - '+friendlyName+'</a>');
    });    


</script>
@endsection