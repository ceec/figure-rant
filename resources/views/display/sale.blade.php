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
          <div class="row">
            <div class="col-md-6">
              <img class="img-responsive" src="/images/sale/0202181416.jpg">
            </div>
            <div class="col-md-6">
              <img class="img-responsive" src="/images/sale/0202181419.jpg">
            </div>
          </div>
          
          <h2>Scales</h2>
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
            <tr>
              <td>Blizzard Tracer - 1st Edition</td>
              <td>$75</td>
              <td>Used</td>
              <td></td>
              <td></td>              
            </tr>                                                                       
          </table>
          <img src="/images/sale/0202181422.jpg">
          <h2>Nendoroids</h2>

          <h3>New - Unopened box, bought from GSC</h3>
          <table class="table">
            <tr>
              <th>Name</th>
              <th>Price (USD)</th>
              <th>Condition</th>
              <th>Notes</th>
              <th>MFC Link</th>
            </tr>
            <tr>
              <td>935 - Kaimina - with GSC Bonus</td>
              <td>$60</td>
              <td>New</td>
              <td></td>
              <td><a href="">MFC</a></td>              
            </tr>    
            <tr>
              <td>970-DX - Merlin - with GSC Bonus</td>
              <td>$45</td>
              <td>New</td>
              <td></td>
              <td><a href="">MFC</a></td>              
            </tr>                                                         
          </table>          


          <div class="row">
            <div class="col-md-4">
              <img class="img-responsive" src="/images/sale/0202181424.jpg">
            </div>
            <div class="col-md-4">
              <img class="img-responsive" src="/images/sale/0202181425.jpg">
            </div>
            <div class="col-md-4">
              <img class="img-responsive" src="/images/sale/0202181426.jpg">
            </div>            
          </div>
          <h3>Opened</h3>
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
              <td>$40</td>
              <td>Used</td>
              <td></td>
              <td><a href="">MFC</a></td>              
            </tr>   
            <tr>
              <td>768 - Harvest Moon Rin</td>
              <td>$40</td>
              <td>Used</td>
              <td></td>
              <td><a href="">MFC</a></td>              
            </tr>   
            <tr>
              <td>769 - Harvest Moon Len</td>
              <td>$40</td>
              <td>Used</td>
              <td></td>
              <td><a href="">MFC</a></td>              
            </tr>                                                                                                                                                                                                                                                                                                   
          </table>   

           <img src="/images/sale/0202181421.jpg">
          <h2>Others</h2>
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
              <td><a href="">MFC</a></td>
            </tr>
                                                         
          </table> 
        </div>

    </div>
</div>
@endsection