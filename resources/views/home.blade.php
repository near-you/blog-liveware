<!-- RIGHTPART -->
<div class="rightpart">
        <div class="rightpart_in">
            <!-- HOME -->
            <div id="home" class="tokyo_tm_section animated">
                <div class="container">
                    <div class="tokyo_tm_home">
                        <div class="home_content">
                            <div class="avatar" data-type="square">
                                <!-- data-type values are: "wave", "circle", "square"-->
                                <div class="image" data-img-url="{{ optional($home)->getImage() }}"></div>
                            </div>
                            <div class="details">
                                <h3 class="name">{{ optional($home)->name }} <span>{{ optional($home)->surname }}</span></h3>
                                <p class="job">{{ optional($home)->short_description }}</p>
                                <div class="social">
                                    <ul>
{{--                                        <li><a href="#"><i class="fa-brands fa-square-facebook"></i></a></li>--}}
{{--                                        <li><a href="#"><i class="fa-brands fa-square-x-twitter"></i></a></li>--}}
{{--                                        <li><a href="#"><i class="fa-brands fa-square-behance"></i></a></li>--}}
{{--                                        <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>--}}
{{--                                        <li><a href="#"><i class="fa-brands fa-square-instagram"></i></a></li>--}}
                                        @if($home->facebook_link != null) <li><a href="{{ $home->facebook_link }}"><i class="icon-facebook-squared"></i></a></li> @endif
                                        @if($home->twitter_link != null) <li><a href="{{ $home->twitter_link }}"><i class="icon-twitter-squared"></i></a></li> @endif
                                        @if($home->behance_link != null) <li><a href="{{ $home->behance_link }}"><i class="icon-behance-squared"></i></a></li> @endif
                                        @if($home->linkedin_link != null) <li><a href="{{ $home->linkedin_link }}"><i class="icon-linkedin-squared"></i></a></li> @endif
                                        @if($home->instagram_link != null) <li><a href="{{ $home->instagram_link }}"><i class="icon-instagram-3"></i></a></li> @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /HOME -->
        </div>
    </div>
