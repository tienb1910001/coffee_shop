@extends('master')
@section('content')
    <main id="main" style="margin-top: 110px">
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Contact</h2>
                    <p>Contact Us</p>
                </div>
            </div>

            <div data-aos="fade-up">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.851787489943!2d105.76792766024077!3d10.029086925284652!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0895a51d60719%3A0x9d76b0035f6d53d0!2sCan%20Tho%20University!5e0!3m2!1sen!2s!4v1649833663355!5m2!1sen!2s"
                    width="1440" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="container" data-aos="fade-up">
                <div class="row mt-5">
                    <div class="col-lg-4">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p>3/2 Street, Ninh Kieu, Can Tho</p>
                            </div>

                            <div class="open-hours">
                                <i class="bi bi-clock"></i>
                                <h4>Open Hours:</h4>
                                <p>
                                    Monday-Saturday:<br>
                                    08:00 AM - 23:00 PM
                                </p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>thegrinder@gmail.com</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p>+84 916 773 523</p>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0">
                        <form method="post" action="page/contact" class="email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="your-name" class="form-control" id="name"
                                        placeholder="Enter your name.." required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="your-email" id="email"
                                        placeholder="Example: 123@gmail.com" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="your-subject" id="subject"
                                    placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="your-message" rows="8" placeholder="Message" required></textarea>
                            </div>
                            <hr>
                            <div class="text-center"><button type="submit" name="send">Send Message</button></div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
