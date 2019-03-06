@extends('layouts.layout')

@section('title')
@parent
For Sale | Figure Rant
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">

          <h1>For Sale</h1>
          <p>Shipping from Colorado, US. Will ship worldwide, shipping not included.</p>
          <h2>Scales</h2>
          <div class="row">
            <div class="col-md-6">
              <img class="img-responsive" src="/images/sale/0305191617a.jpg">
            </div>
            <!--<div class="col-md-6">
              <img class="img-responsive" src="/images/sale/0202181419.jpg">
            </div>-->
          </div>
          
          
          <table class="table">
            <tr>
              <th>Name</th>
              <th>Price (USD)</th>
              <th>Condition</th>
              <th>Review</th>
              <th>MFC Link</th>
            </tr>
            <tr>
              <td>1/8 Uzuki Shimamura by GSC</td>
              <td>$50</td>
              <td>Used</td>
              <td><a href="/review/uzuki-shimamura">Review</a></td>
              <td><a href="https://myfigurecollection.net/item/166431">MFC</a></td>              
            </tr> 
          <!--  <tr>
              <td>Blizzard Tracer - 1st Edition</td>
              <td>$75</td>
              <td>Used</td>
              <td></td>
              <td></td>              
            </tr>  -->                                                                     
          </table>
          <h2>Nendoroids</h2>
          <h3>New - Unopened box, bought from GSC</h3>
          <img src="/images/sale/0305191616a.jpg">
          

          
          <table class="table">
            <tr>
              <th>Name</th>
              <th>Price (USD)</th>
              <th>Condition</th>
              <th>Notes</th>
              <th>MFC Link</th>
            </tr>
            <tr>
              <td>935 - Kaimina</td>
              <td>$50</td>
              <td>New</td>
              <td>with GSC Bonus</td>
              <td><a href="https://myfigurecollection.net/item/651234">MFC</a></td>              
            </tr>    
            <tr>
              <td>970-DX - Merlin Magus of Flowers Version</td>
              <td>$55</td>
              <td>New</td>
              <td></td>
              <td><a href="https://myfigurecollection.net/item/741846">MFC</a></td>              
            </tr>                                                         
          </table>          

          <h3>Opened</h3>
          <div class="row">
            <div class="col-md-4">
              <img class="img-responsive" src="/images/sale/0305191617.jpg">
            </div>
            <div class="col-md-8">
              <img class="img-responsive" src="/images/sale/0305191618.jpg">
            </div>
          
          <table class="table">
            <tr>
              <th>Name</th>
              <th>Price (USD)</th>
              <th>Condition</th>
              <th>Notes</th>
              <th>MFC Link</th>
            </tr>                                                             
            <tr>
              <td>574 - Moritomo Nozomi</td>
              <td>$30</td>
              <td>Used</td>
              <td></td>
              <td><a href="https://myfigurecollection.net/item/287709">MFC</a></td>              
            </tr>               
            <tr>
              <td>539 - Harvest Moon Miku</td>
              <td>$50</td>
              <td>Used</td>
              <td></td>
              <td><a href="https://myfigurecollection.net/item/323689">MFC</a></td>              
            </tr>   
            <tr>
              <td>768 - Harvest Moon Rin</td>
              <td>$50</td>
              <td>Used</td>
              <td></td>
              <td><a href="https://myfigurecollection.net/item/549377">MFC</a></td>              
            </tr>   
            <tr>
              <td>769 - Harvest Moon Len</td>
              <td>$50</td>
              <td>Used</td>
              <td></td>
              <td><a href="https://myfigurecollection.net/item/549380">MFC</a></td>              
            </tr>                                                                                                                                                                                                                                                                                                   
          </table>   

          <h2>Others</h2>
          <div class="row">
            <div class="col-md-6">
              <img class="img-responsive" src="/images/sale/0305191616_HDR.jpg">
            </div>
          </div>
          <table class="table">
            <tr>
              <th>Name</th>
              <th>Price (USD)</th>
              <th>Condition</th>
              <th>Notes</th>
              <th>MFC Link</th>
            </tr>
            <tr>
              <td>Ace Prize Figure</td>
              <td>$20</td>
              <td>New</td>
              <td></td>
              <td><a href="https://myfigurecollection.net/item/740376">MFC</a></td>
            </tr>
                                                         
          </table> 
        </div>

    </div>
</div>
@endsection