<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>{{ $details["title"] }}</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <style>
      body {
        background-color: #f6f6f6;
        font-family: nunito;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
        padding: 0;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%; 
      }
      .frame {
          width: 100%;
          display: flex;
          justify-content: center;
          margin: 20px 0;
      }

      .ticket {
          background-color: white;
          border-radius: 18px;
          width: 450px;
      }

      .title {
          display: flex;
          justify-content: space-between;
          align-items: center;
          margin-bottom: 35px;
      }

    div.badge-ticket-warning {
        background-color: #ffeec1;
        color: #ffc100;
        padding: 1px 15px;
        border-radius: 25px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    div.badge-ticket-warning > div.badge-dotted {
        height: 12px;
        width: 12px;
        background-color: #ffc100;
        border-radius: 100%;
    }

    div.badge-ticket-success {
        background-color: #70e000;
        color: #008000;
        padding: 1px 15px;
        border-radius: 25px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    div.badge-ticket-success > div.badge-dotted {
        height: 12px;
        width: 12px;
        background-color: #008000;
        border-radius: 100%;
    }

      .detail {
          display: flex;
          flex-flow: column;
          gap: 20px;
      }

      .dotted {
          height: 25px;
          width: 100%;
          position: relative;
      }

      .dotted .left,
      .dotted .right {
          position: absolute;
          background-color: #f6f6f6;
          border-radius: 100%;
          width: 40px;
          height: 40px;
      }

      .dotted .left {
          top: -20px;
          left: -20px;
      }

      .dotted .right {
          top: -20px;
          right: -20px;
      }

      .ticket .desc {
          border-bottom: 3px dotted #999;
          padding: 25px 25px 50px 25px;
      }

      .ticket .qr {
          height: 250px;
          display: flex;
          flex-flow: column;
          justify-content: center;
          align-items: center;
          padding: 15px;
      }

      .qr .orderid p {
          font-size: 15px;
          font-weight: 500;
          color: #475569;
      }
    </style>
  </head>
  <body>
    <div class="frame">
      <div class="ticket">
        <div class="desc">
          <div class="title">
            DELUNA MUSIC FESTIVAL 2024
  
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
              <p>{{ $details["presale"] }}</p> <br>
              Kode Tiket : {{ $details["kode_tiket"] }} <br>
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
            <h1>E-Ticket Kamu di bawah sini, klik link untuk melihatnya.</h1>
            <a href="https://delunamusicfest.com/tickets/customer/detail/{{ $details["link"] }}">https://delunamusicfest.com/tickets/customer/detail/{{ $details["link"] }}</a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>