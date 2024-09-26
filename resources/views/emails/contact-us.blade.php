<x-layout>
<style>
.overlay {
            width: 100%;
            height: 100%;
            z-index: 1;
            position: relative;
            padding: 20px 0;
        }
        .section-bg {
            background-size: cover;
            position: relative;
            background-position: left;
            z-index: 0;
            padding: 0;
            min-height: auto;
            overflow: hidden;
        }
        .contact-form {
            position: relative;
            padding: 45px 0 45px 60px;
        }

        .contact-form:before {
            position: absolute;
            content: '';
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: white;
            border-radius: 6px;
            box-shadow: 10px 40px 40px rgba(0,0,0,.2);
            pointer-events: none;
            right: auto;
            width: 100%;
        }
        .particles-js-canvas-el {
            position: absolute;
            left: 0;
            top: 0;
            z-index: 1;
        }
        .contact-form input {
        color:#222;
        width: 90%
        }


        .contact-form textarea {
        color:#222;
            width: 90%;
            font-size: 16px;
            font-weight: 600;
        }

        .contact-form input::placeholder {
        color:#222;
        }
        .contact-form textarea::placeholder {
        color:#222;
            width: 90%

        }
        .contact-form input {
            margin-bottom: 30px;
            font-size: 16px;
            font-weight: 600;
            height: 55px;
        }

        .taso-btn {
            background-color: #fff;
            color: #214dcb;
            -webkit-box-shadow: 0px 10px 30px 0px rgba(255, 255, 255, 0.32);
            box-shadow: 0px 10px 30px 0px rgba(255, 255, 255, 0.17);
        }
        .contact-info {
            padding: 0 30px 0px 0;
        }

        h2.contact-title {
            font-size: 35px;
            font-weight: 600;
            color: #fff;
            margin-bottom: 30px;
        }

        .contact-info p {
            color: #ececec;
        }

        ul.contact-info {
            margin-top: 30px;
        }

        ul.contact-info li {
            margin-bottom: 22px;
        }



        ul.contact-info span {
            font-size: 20px;
            line-height: 26px;
        }
        ul.contact-info li {
            display: flex;
            width: 100%;
        }

        .info-left {
            width: 10%;
        }

        .info-left i {
            width: 30px;
            height: 30px;
            line-height: 30px;
            font-size: 30px;
            color: #ffffff;
        }

        .info-right h4 {
            color: #fff;
            font-size: 18px;
        }
        .contact-page .info-left i{
        color: #FE846F;
        }
        .btn {
        display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            font-family: 'Poppins', sans-serif;
            padding: 10px 30px 10px;
            font-size: 17px;
            line-height: 28px;
            border: 0px;
            border-radius: 10px;
            -webkit-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
            -o-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
        }
        @media only screen and (max-width: 767px) {
        .contact-form {
            padding: 30p
        }
        .btn-big {
            color: #ffffff;
            -webkit-box-shadow: 0px 5px 20px 0px rgba(45, 45, 45, 0.47843137254901963);
            box-shadow: 2px 5px 10px 0px rgba(45, 45, 45, 0.19);
            color: #fff !important;
            margin-right: 20px;
            background: #FE846F;
            transition: .2s;
            border: 2px solid #FE846F;
            margin-top: 50px;
        }
        .contact-form:before {
            width: 100%;
        }
    }
    
</style>
    <section class="section-bg" data-scroll-index="7">
          <div class="overlay pt-100 pb-100 ">
            <div class="container">
               <div class="row">
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="contact-info">

                            <h2 class="contact-title">Have Any Questions?</h2>
                            <p>Lorem ipsum is a dummy text used to replace text in some areas just for the purpose of an example. It can be used in publishing and graphic design. The lorem ipsum text is usually a section of a Latin text by Cicero with words altered, added and removed to make it nonsensical.</p>
                            <ul class="contact-info">
                                <li>
                                  <div class="info-left">
                                      <i class="fas fa-mobile-alt"></i>
                                  </div>
                                  <div class="info-right">
                                      <h4>+95912345678</h4>
                                  </div>
                                </li>
                                <li>
                                  <div class="info-left">
                                      <i class="fas fa-at"></i>
                                  </div>
                                  <div class="info-right">
                                      <h4>myEmail@example.com</h4>
                                  </div>
                                </li>
                                <li>
                                  <div class="info-left">
                                      <i class="fas fa-map-marker-alt"></i>
                                  </div>
                                  <div class="info-right">
                                      <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, vitae.</h4>
                                  </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 align-items-center">
                            <div class="contact-form">
                                        <!--Contact Form-->
                                        <form action="/sent-email/contact" id='contact-form' method='POST'>
                                            @csrf
                                            @method('POST')
                                            <input type='hidden' name='form-name' value='contactForm' />
                                            <div class="row">
                                               <div class="col-md-12">
                                                  <div class="form-group">
                                                     <input type="text" name="name" class="form-control" id="first-name" placeholder="Enter Your Name *" required="required" value="{{ auth()->check() ? auth()->user()->first_name : '' }}">
                                                  </div>
                                               </div>
                                               <div class="col-md-12">
                                                  <div class="form-group">
                                                     <input type="email" name="email" class="form-control" id="email" placeholder="Enter Your Email *" required="required" value=" {{ auth()->check() ? auth()->user()->email : request()->email }}">
                                                  </div>
                                               </div>

                                               <div class="col-md-12">
                                                  <div class="form-group">
                                                       <textarea rows="4" name="message" class="form-control" id="description" placeholder="Enter Your Message *" required="required" value='{{old('message')}}'></textarea>
                                                  </div>
                                               </div>
                                                <div class="col-md-12">
                                                    <!--contact button-->
                                                    <button  class="btn-big btn btn-bg bg-orange-500 text-white" type="submit">
                                                        Send Us <i class="fas fa-arrow-right"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                    </div>
               </div>
           </div>
              </div>
        </section>
</x-layout>