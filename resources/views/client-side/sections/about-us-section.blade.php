<div id="AboutUs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="SectionTitle">
                    <h2>the restaurant</h2>
                    <p>A little about us and a breif history of how we started.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @if( isset($about_us))
                <div class="col-lg-6">
                    <div class="AboutUsContent">
                        <h2>{{ $about_us['title'] }}</h2>
                        <p>{{ $about_us['body'] }}</p>
                        <div class="AboutUsContentSignature">
                            <img src="{{ asset('client-side/dist/images/logo-handwrite.png') }}" class="img-fluid"
                                 alt="">
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="AboutUsImage">
                        <div class="AboutUsSince"><span><i>since</i><i>{{ $about_us['since'] }}</i></span></div>
                        <img
                            src="{{ asset('client-side/dist/images/mario-mesaglio-7BZzlV0Z9R4-unsplash-780x520.jpg') }}"
                            class="img-fluid" alt="">
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
