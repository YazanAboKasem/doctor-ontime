
<link rel="stylesheet" href=
    "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
<style>
    @page {
        width: 40mm;
        height: 30mm;
        padding: 1mm;
        margin: 0px 0px 0px 0px;
    }

    .location {
        padding: 5px;
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
        height: 100%;
        vertical-align: middle;
        float: right;
        display: inline;
        font-size: 125%;
        position: absolute;
        top: 0mm;
        left: 20mm;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }


    .qr-code {
        margin: 2px;
        width: 12mm;
        height: 12mm;
    }
</style>

<div class="row" style="width: 40mm ">
    <div class="col-lg-12 " style="text-align: center">
        <img  style="width: 20mm;height: 8mm;" src="{{ getImage('assets/images/smLogo.png')}}" alt="@lang('image')">

    </div>
    <img  class='qr-code' src="https://chart.googleapis.com/chart?cht=qr&chl={{$qr}}&chs=160x160&chld=L|0"/>
    <div class="col-lg-8" >
        <p style="font-size: 10px;margin: 0px;"> {{$date}}</p>
        <p style="font-size: 10px;margin: 2px;">id: {{$product->exl_id}}-{{$product->id}}</p>
    <p style="font-size: 8px;margin: 0px;"><s style="font-size: 12px;margin: 0px">{{$product->real_price}} </s> AED</p>
    </div>
    <div class="col-lg-12 " >
        <p style="font-size: 12px;margin: 0px;text-align: center;"> {{$product->statusCo->name}}</p>
    </div>

</div>

</div>
<script src=
            "https://code.jquery.com/jquery-3.5.1.js">
</script>

<script>

    // Function to HTML encode the text
    // This creates a new hidden element,
    // inserts the given text into it
    // and outputs it out as HTML

</script>


