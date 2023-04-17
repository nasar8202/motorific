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
    flex: 0 0 50%;
    }
    .social-icon a {
    text-decoration: none;
    color: #000000ba;
}
    .content-img {
      display: flex;
    align-items: center;
    gap: 20px;
    padding-left: 20px;
    flex-direction: row-reverse;
    }
    .content-img.content-img1 {
    flex-direction: row;
        padding-left: 0;
}

    .content-img img {
      object-fit: cover;
      flex: 0 0 50%;
      height: 200px;

    }
    .content-img span {
      font-size: 18px;
      color: #000;
    }
    .mail-sec .mail-content p.detail {
    font-weight: 700;
    font-size: 22px;
    text-align: center;
    margin-bottom: 40px;
    color: #7977a2;
    margin-top: 10px;
}
.qa-ans p {
    font-size: 15px;
    color: #000;
}
.qa-ans p strong {
    font-size: 20px;
    color: #7977a2;
    margin-bottom: 10px;
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
            <img src="{{ URL::asset('frontend/seller/assets/image/logo.png') }}" width="80px" height="50px" alt="" /> <br />
           
          </div>
        </div>
        <div class="mail-content">
          <h2>Welcome To Motorific</h2>
          <p>Hi {{ ucwords($data['name']) }}!</p>
          <p>
           
            Congratulations Motorific has added your Vehicle registration number <strong>{{ strtoupper($data['vehicle_registration']) }}</strong>. Below are your login details to check the status of your vehicle.
          </p>
          <p>Personal Details</p>
          <div class="content-img content-img1">
            <div class="car-det">
              <span>Your Name: {{ $data['name'] }}</span>
              <span> Your Email: {{ $data['email'] }} </span>
              <span> Your New Password Is: {{ $data['password'] }} </span>
             
            </div>
          </div>
          <p class="detail">Car Details</p>
          <div class="content-img">
            <img src="{{ asset('/vehicles/vehicles_images/'.$data['front']) }} " width="100px" style="object-fit: cover" alt="" />
            <div class="car-det">
              <span>Model: {{ $data['vehicle_name'] }}</span>
              <span> Reg: {{ strtoupper($data['vehicle_registration']) }} </span>
             
              <span> Mileage: {{ $data['vehicle_mileage'] }} </span>
              <span>Car age:{{ $data['age'] }}  </span>
              <span>Colour: {{ $data['colour'] }} </span>
            </div>
          </div>
        </div>
        <div class="customer-detail">
          
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
                >info@motorific.co.uk</span
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
              >© <?php echo date("Y"); ?>
              Motorific Online Ltd, All rights reserved. Company number 14710738 Motorific Online Ltd is registered in England & Wales. Trading Address: 55 Armory way London SW18 1JZ. <br />
           
            </span>
          </div>
        </div>
      </section>
    </main>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </body>
</html>
