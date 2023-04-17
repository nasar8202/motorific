<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=
    , initial-scale=1.0"
    />
    <title>Email</title>
  </head>

  <style>
    body {
      font-family: sans-serif;
    }
    .mail-img-one {
      text-align: center;
    }

    .mail-img-one img {
      width: 520px;
    }
    .car-det {
      display: flex;
      flex-direction: column;
    }
    .social-icon a {
    text-decoration: none;
    color: #000000ba;
}
    .content-img {
      display: flex;
      align-items: center;
      gap: 30px;
      padding-left: 2rem;
    }

    .content-img img {
      width: 800px;
    }
    .social-icon {
    text-align: center;
    padding-bottom: 30px;
    padding-top: 30px;
}
    .mail-content {
      margin-left: 1.5rem;
      border-left: 1px solid #5c5a5a87;
      padding-left: 1rem;
      margin-top: 2rem;
    }
    .customer-detail {
      margin-left: 1.5rem;
      border-left: 1px solid #5c5a5a87;
      padding-left: 1rem;
      margin-top: 2rem;
      padding-bottom: 1rem;
    }
    .customer-detail .car-det {
      padding-top: 1rem;
      padding-bottom: 1rem;
    }
    .btn-mail {
      padding-top: 3rem;
      text-align: center;
      padding-bottom: 3rem;
    }

    .btn-mail a {
      background: #2196f3;
      padding: 1rem 9rem;
      text-decoration: none;
      border-radius: 18px;
      color: white;
    }
    .qa-ans {
      padding-top: 1rem;
      padding-bottom: 1rem;
      border-top: 1px solid #cfcfcf;
      border-bottom: 1px solid #cfcfcf;
    }
    .footer-mail img {
      width: 20%;
      text-align: center;
    }
    main {
      overflow-x: hidden;
    }
    @media only screen and (max-width: 1200px) {
      .content-img img {
        width: 580px;
      }
      .mail-img-one img {
        width: 400px;
      }
    }
    @media only screen and (max-width: 991px) {
      .content-img img {
        width: 400px;
      }
    }
    @media only screen and (max-width: 767px) {
      .mail-img-one img {
        width: 240px;
      }
      .content-img {
        display: block;
        padding-left: 5px;
        width: 91%;
      }
      .content-img img {
        width: 100%;
      }
      p {
        font-size: 14px;
      }
      .btn-mail a {
        padding: 1rem 2rem;
      }
      .car-det span {
        font-size: 14px;
      }
      .mail-content {
    margin-left: 0.5rem;

}
.footer-mail img {
    width: 210px;

}
.footer-mail > span {
    font-size: 11px;
}

.footer-mail > span br{
    display:none;
}
    }
  </style>

  <body>
    <main>
      <section class="mail-sec">
        <div class="mail-name">
          <p>
            <strong>From: </strong> Motorofic
            <span style="color: blue"> info@motorific.co.uk</span> >
          </p>
          <p><strong>Date: </strong> {{ $data['date'] }}</p>
          <p>
            <strong>To: </strong
            ><span style="color: blue"> info@motorific.co.uk</span>
          </p>
          <p><strong>Subject: Your Vehicle Valuation!</strong></p>
          <p>
            <strong>Reply-To</strong
            ><span style="color: blue"> noreply@motorific.co.uk</span>
          </p>

          <div class="mail-img-one">
            <img src="{{ URL::asset('frontend/seller/assets/image/logo.png') }}" width="100px" height="50px" alt="" /> <br />
            
          </div>
        </div>
        <div class="mail-content">
            <h2>Valuation!</h2>
            <p>Hi {{ ucwords($data['name']) }}!</p>
            <p>
              Congratulations - Your Vehicle <strong>{{ ucwords($data['vehicle_name']) }}</strong> valuation has been added by Motorific
               for the price of £{{ $data['reserve_price'] }}.

          </p>
            <p>Car Details</p>

            <div class="content-img">
              
              <div class="car-det">
                <span>Model: {{ $data['vehicle_name'] }} </span>
                <span> Reg: {{ strtoupper($data['vehicle_registration']) }} </span>
               
                <span> Mileage: {{ $data['vehicle_mileage'] }} </span>
              
              </div>
            </div>
          </div>
        <div class="customer-detail">
          
          <div class="qa-ans">
            <p><strong>You Can Approved Or Reject Valuation </strong></p>
            <a href=" {{ route('approveBySellerVehicle',[$data['vehicle_id'],$data['user_id']]) }} ">Approved Valuation Price</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="{{route('rejectBySellerVehicle',[$data['vehicle_id'],$data['user_id']])}}">Reject Valuation Price</a>
          </div>
          

         
          </div>
        </div>
      </section>
    </main>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </body>
</html>
