<!-- RIGHTPART -->
<div class="rightpart">

        <div class="rightpart_in">

            <!-- ABOUT -->
            <div id="about" class="tokyo_tm_section active animated">

                <div class="container">

                    <div class="tokyo_tm_about">

                        <div class="tokyo_tm_title">

                            <div class="title_flex">

                                <div class="left">

                                    <span>About</span>

                                    <h3>About Me</h3>

                                </div>

                            </div>

                        </div>

                        <div class="top_author_image">
                            <img src="{{ optional($about)->getImage() }}" alt="About pictures"/>
                        </div>

                        <div class="about_title">
                            <h3>{{ $home->name ?? '' }} {{ $home->surname ?? '' }}</h3>
                            <span>{{ $about->my_profession }}</span>
                        </div>

                        <div class="about_text">
                            {!! $about->description !!}
                        </div>

                        <div class="tokyo_tm_short_info">
                            <div class="left">
                                <div class="tokyo_tm_info">
                                    <ul>
                                        @if( $birthday )
                                            <li>
                                                <span>Birthday:</span>
                                                <span>{{ $birthday }}</span></li>
                                            <li>
                                                <span>Age:</span>
                                                <span>{{ \Carbon\Carbon::now()->diffInYears($birthday) }}</span>
                                            </li>
                                        @endif
                                        @if( $about->address )
                                            <li>
                                                <span>Address:</span>
                                                <span>{{ $about->address }}</span>
                                            </li>
                                        @endif
                                        @if( $about->email )
                                            <li>
                                                <span>Email:</span>
                                                <span>
                                                <a href="mailto:{{ $about->email }}">{{ $about->email }}</a>
                                            </span>
                                            </li>
                                        @endif
                                        @if( $about->phone )
                                            <li>
                                                <span>Phone:</span>
                                                <span>
                                                <a href="tel:{{ $about->phone }}">{{ $about->phone }}</a>
                                            </span>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="right">
                                <div class="tokyo_tm_info">
                                    <ul>
                                        @if( $about->nationality )
                                            <li>
                                                <span>Nationality:</span>
                                                <span>{{ $about->nationality }}</span>
                                            </li>
                                        @endif
                                        @if( $about->study )
                                            <li>
                                                <span>Study:</span>
                                                <span>{{ $about->study }}</span>
                                            </li>
                                        @endif
                                        @if( $about->degree )
                                            <li>
                                                <span>Degree:</span>
                                                <span>{{ $about->degree }}</span>
                                            </li>
                                        @endif
                                        @if( $about->interest )
                                            <li>
                                                <span>Interest:</span>
                                                <span>{{ $about->interest }}</span>
                                            </li>
                                        @endif
                                        @if( $about->freelance )
                                            <li>
                                                <span>Freelance:</span>
                                                <span>{{ $about->freelance }}</span>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="tokyo_tm_button" data-position="left">
                            <a href="{{ asset('/image/cv/1.jpg') }}" download>
                                <span>Download CV</span>
                            </a>
                        </div>

                    </div>
                </div>

                <!-- START SKILLS SECTION -->
                <div class="tokyo_tm_progressbox">
                    <div class="container">
                        <div class="in">
                            <div class="left">
                                <div class="tokyo_section_title">
                                    <h3>{{ $skillTitleLeft->title }}</h3>
                                </div>
                                <div class="tokyo_progress">
                                    @foreach( $skillLeft as $skill )
                                        <div class="progress_inner" data-value="{{ $skill->percent }}">
                                    <span>
                                        <span class="label">{{ $skill->title }}</span>
                                        <span class="number">{{ $skill->percent }}%</span>
                                    </span>
                                            <div class="background">
                                                <div class="bar">
                                                    <div class="bar_in"></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="right">
                                <div class="tokyo_section_title">
                                    <h3>{{ $skillTitleRight->title }}</h3>
                                </div>
                                <div class="tokyo_progress">
                                    @foreach( $skillRight as $skill )
                                        <div class="progress_inner" data-value="{{ $skill->percent }}">
                                    <span>
                                        <span class="label">{{ $skill->title }}</span>
                                        <span class="number">{{ $skill->percent }}%</span>
                                    </span>
                                            <div class="background">
                                                <div class="bar">
                                                    <div class="bar_in"></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tokyo_tm_skillbox">
                    <div class="container">
                        <div class="in">
                            <div class="left">
                                <div class="tokyo_section_title">
                                    <h3>Knowledge</h3>
                                </div>
                                <div class="tokyo_tm_skill_list">
                                    <ul>
                                        @foreach($knowledge as $know)
                                            <li>
                                                <span><img class="svg" src="{{asset('image/svg/rightarrow.svg')}}" alt=""/>{{ $know->title }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="right">
                                <div class="tokyo_section_title">
                                    <h3>Interests</h3>
                                </div>
                                <div class="tokyo_tm_skill_list">
                                    <ul>
                                        @foreach($interests as $interest)
                                            <li>
                                                <span><img class="svg" src="{{asset('image/svg/rightarrow.svg')}}" alt=""/>{{ $interest->title }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tokyo_tm_resumebox">
                    <div class="container">
                        <div class="in">
                            <div class="left">
                                <div class="tokyo_section_title">
                                    <h3>Education</h3>
                                </div>
                                <div class="tokyo_tm_resume_list">
                                    <ul>
                                        @foreach($educations as $education)
                                            <li>
                                                <div class="list_inner">
                                                    <div class="time">
                                                        <span>{{ $education->year_start }} - {{ $education->year_finish }}</span>
                                                    </div>
                                                    <div class="place">
                                                        <h3>{{ $education->institution_name }}</h3>
                                                        <span>{{ $education->degree }}</span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="right">
                                <div class="tokyo_section_title">
                                    <h3>Experience</h3>
                                </div>
                                <div class="tokyo_tm_resume_list">
                                    <ul>
                                        @foreach($experiences as $experience)
                                            <li>
                                                <div class="list_inner">
                                                    <div class="time">
                                                        <span>{{ $experience->year_start }} - {{ $experience->year_finish }}</span>
                                                    </div>
                                                    <div class="place">
                                                        <h3>{{ $experience->company }}</h3>
                                                        <span>{{ $experience->profession }}</span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tokyo_tm_testimonials">
                    <div class="container">
                        <div class="tokyo_section_title">
                            <h3>Testimonials</h3>
                        </div>
                        <div class="list">
                            <ul class="owl-carousel">
                                <li>
                                    <div class="list_inner">
                                        <div class="text">
                                            <p>Beautiful minimalist design and great, fast response with support. Highly
                                                recommend. Thanks Marketify!</p>
                                        </div>
                                        <div class="details">
                                            <div class="image">
                                                <div class="main"
                                                     data-img-url="{{asset('image/testimonials/1.jpg')}}"></div>
                                            </div>
                                            <div class="info">
                                                <h3>Alexander Walker</h3>
                                                <span>Graphic Designer</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list_inner">
                                        <div class="text">
                                            <p>These people really know what they are doing! Great customer support
                                                availability and supperb kindness.</p>
                                        </div>
                                        <div class="details">
                                            <div class="image">
                                                <div class="main"
                                                     data-img-url="{{asset('image/testimonials/2.jpg')}}"></div>
                                            </div>
                                            <div class="info">
                                                <h3>Isabelle Smith</h3>
                                                <span>Content Manager</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list_inner">
                                        <div class="text">
                                            <p>I had a little problem and the support was just awesome to quickly solve the
                                                situation. And keep going on.</p>
                                        </div>
                                        <div class="details">
                                            <div class="image">
                                                <div class="main"
                                                     data-img-url="{{asset('image/testimonials/3.jpg')}}"></div>
                                            </div>
                                            <div class="info">
                                                <h3>Baraka Clinton</h3>
                                                <span>English Teacher</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- END SKILLS SECTION -->

            </div>
            <!-- /ABOUT -->

        </div>

    </div>
