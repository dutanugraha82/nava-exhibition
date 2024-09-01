<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>{{ $details["title"] }}</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("css/ticket.css") }}">
    <style>
      * {
        font-family: nunito;
      }
      body {
        background-color: #f8f9fcff;
      }
    </style>
  </head>
  <body>
    <div class="frame">
      <div class="ticket">
        <div class="desc">
          <div class="title">
            Psychoforia Event
  
            <div class="{{ $details['status_badge'] }}">
              <div class="badge-dotted"></div>
              <strong>{{ $details['status'] }}</strong>
            </div>
          </div>
  
          <div class="detail">
            <div class="detail-info">
              {{ $details["name"] }} <br/>
              {{ $details["email"] }} <br/>
              {{ $details["nohp"] }}
            </div>
            <div class="detail-ticket">
              <p>{{ $details["presale"] }}</p>
              Total tiket: {{ $details["jumlah_tiket"] }} <br/>
              Harga satuan tiket: Rp. {{ $details["harga_tiket"] }} <br/> 
              Total Harga tiket: Rp. {{ $details["total_harga"] }} <br/>
            </div>
          </div>
  
        </div>
        <div class="dotted">
          <div class="left"></div>
          <div class="right"></div>
        </div>
        <div class="qr">
          <div class="orderid">
            <center>
              {{ $details["qr"] }}
            </center>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>