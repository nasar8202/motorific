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
      flex-wrap: wrap;
    justify-content: space-between;
    flex-direction: row-reverse;
    }

    .content-img img {
      width: 300px;
      height: 200px;
      display: flex
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
          {{-- <p>
            <strong>From: </strong> Motorofic
            <span style="color: blue"> {{ $data['email'] }}</span> >
          </p>
          <p><strong>Date: </strong> {{ $data['date'] }}</p>
          <p>
            <strong>To: </strong
            ><span style="color: blue"> info@motorific.co.uk</span>
          </p>
          <p><strong>Subject: You bought a car!</strong></p>
          <p>
            <strong>Reply-To</strong
            ><span style="color: blue"> noreply@motorific.co.uk</span>
          </p> --}}

          <div class="mail-img-one">
            <img src="{{ URL::asset('frontend/seller/assets/image/logo.png') }}" alt="" /> <br />
            {{-- <img src="{{ URL::asset('frontend/seller/assets/image/logo.png') }}" alt="" /> --}}
          </div>
        </div>
        <div class="mail-content">
          <h2>You've just bought a car!</h2>
          <p>Hi {{ $data['name'] }}!</p>
          <p>
            Congratulations - you've successfully bought a
            <strong>{{ strtoupper($data['vehicle_registration']) }}</strong> for the price of £{{ $data['bidded_price'] }}.
          </p>
          <p>Car Details</p>

          <div class="content-img">
            <img src="{{ asset('/vehicles/vehicles_images/'.$data['front']) }} " alt="" />
            <div class="car-det">
              <span>Model: {{ $data['vehicle_name'] }} </span>
              <span> Reg: {{ strtoupper($data['vehicle_registration'] )}} </span>
              {{-- <span>Fee: £175 </span> --}}
              {{-- <span> Distance: 174 miles </span> --}}
              <span> Mileage: {{ $data['vehicle_mileage'] }} </span>
              <span>Car age:{{ $data['age'] }} </span>
              <span>Colour: {{ $data['colour'] }} </span>
            </div>
          </div>
        </div>
        <div class="customer-detail">
          {{-- <strong>Customer Contact Details</strong>
          <div class="car-det">
            <span>Name: Carter</span>
            <span> Phone: +447703287219 </span>
            <span>Phone: +447703287219</span>
            <span>Postcode: SY20 9LR</span>
          </div>
          <span
            ><strong
              >Now it’s time to arrange inspection, collection and payment with
              the seller.</strong
            ></span
          >
          <div class="btn-mail">
            <a href="">Contact the seller here </a>
          </div> --}}
          <div class="qa-ans">
            <p><strong>What next? </strong></p>
            <p>
              You’ll need to find a time that’s right for both parties so you
              can inspect the vehicle and make sure it looks as good as
              advertised.
            </p>
            {{-- <p>
              If you're happy you can either ask us to collect the car or pick
              it up yourself and arrange payment with the seller.
            </p> --}}
          </div>
          <div class="qa-ans">
            {{-- <p><strong>What next? </strong></p> --}}
            <p>
              Drop us an email -
              <span style="color: #2196f3"
                >partner.operations@motorific.co.uk</span
              >
              and we’ll get back to you as soon as possible.
            </p>
            <p>Thanks</p>
            <p>The motorific team.</p>
          </div>

          <div class="footer-mail">
            <div class="social-icon">
                <a href=""> <span class="fa-stack fa-lg">

              <i class="fas fa-circle fa-stack-2x"></i>
              <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
            </span></a>
            <a href=""><span class="fa-stack fa-lg">
              <i class="fas fa-circle fa-stack-2x"></i>
              <i class="fab fa-facebook fa-stack-1x fa-inverse"></i>
            </span></a>
            <a href=""><span class="fa-stack fa-lg">
              <i class="fas fa-circle fa-stack-2x"></i>
              <i class="fab fa-youtube fa-stack-1x fa-inverse"></i>
            </span></a>
            <a href=""> <span class="fa-stack fa-lg">
              <i class="fas fa-circle fa-stack-2x"></i>
              <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
            </span></a>
            {{-- <p><strong>Rated 4.7/5 from 28,673 reviews </strong></p> --}}

            <img src="{{ URL::asset('frontend/seller/assets/image/trans.png') }} " alt="" />
        </div>


        <span
        ><?php echo date('Y')?>© Motorific Online Ltd, All rights reserved. Company number 14710738 Motorific Online Ltd is registered in England & Wales. Trading Address: 55 Armory way London SW18 1JZ.
      </span>
          </div>
        </div>
      </section>
    </main>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </body>
</html>
