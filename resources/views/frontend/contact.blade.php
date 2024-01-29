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
                    <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum formas human. qui sequitur mutationem consuetudium lectorum. Mirum est notare quam</p>
                    <ul>
                        <li><i class="fa fa-fax"></i> Address : No 40 Baria Sreet 133/2 NewYork City</li>
                        <li><i class="fa fa-phone"></i> <a href="#">Infor@roadthemes.com</a></li>
                        <li><i class="fa fa-envelope-o"></i><a href="tel:0(1234)567890">0 (1234) 567 890</a> </li>
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