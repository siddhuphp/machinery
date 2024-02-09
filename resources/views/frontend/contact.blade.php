@extends('frontend.layout')
@section('breadcrum','Contact Us')
@section('content')


<!--contact area start-->
<div class="contact_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="contact_message content">
                    <h3>contact us</h3>
                    <p>Whether you have questions about our diverse range of used excavators, need assistance navigating our platform, or are looking for personalized guidance in your equipment search, our dedicated team at ResellRebuy.com is here to help.</p>
                    <p>Feel free to reach out to us via email at support@resellrebuy.com, and our knowledgeable customer support representatives will respond promptly to address your inquiries. Additionally, you can connect with us through our contact form on the website, providing us with details about your specific needs and preferences.
We value your feedback, and your experience on our platform matters to us. At ResellRebuy.com, we are committed to providing exceptional service, transparency, and support throughout your journey in the world of used excavators.</p>
                    <p>Join us in revolutionizing the way you buy and sell construction equipment. Contact ResellRebuy.com today and experience the difference of a marketplace that prioritizes your needs and aspirations in the construction industry. We look forward to assisting you on your path to profits and success.</p>
                    <ul>
                        <li><i class="fa fa-fax"></i> Address: B-Block, Shed-4, Autonagar, Visakhapatnam-530012.</li>
                        <li><i class="fa fa-phone"></i> <a href="#">support@resellrebuy.com</a></li>
                        <li><i class="fa fa-envelope-o"></i><a href="tel:0(1234)567890">+91-9989287932</a> </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
            </div>
            @endif
                <div class="contact_message form">
                    <h3>Tell us your project</h3>
                    <form id="contact-form" method="POST" action="{{ route('mail') }}">
                    @csrf
                        <p>
                            <label> Your Name (required)</label>
                            <input name="name" placeholder="Name *" type="text" required value="{{ old('name') }}">
                        </p>
                        <p>
                            <label> Your Email (required)</label>
                            <input name="email" placeholder="Email *" type="email" required value="{{ old('email') }}">
                        </p>
                        <p>
                            <label> Your Phone (required)</label>
                            <input name="phone" placeholder="Phone *" type="text" required value="{{ old('phone') }}">
                        </p>
                        <p>
                            <label> Subject</label>
                            <input name="subject" placeholder="Subject *" type="text" required value="{{ old('subject') }}">
                        </p>
                        <div class="contact_textarea">
                            <label> Your Message</label>
                            <textarea placeholder="Message *" name="message" required class="form-control2">{{ old('message') }}</textarea>
                        </div>
                        <button type="submit"> Send </button>
                        <!-- <p class="form-messege"></p> -->
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection