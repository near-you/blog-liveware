<!-- RIGHTPART -->
<div class="rightpart">
        <div class="rightpart_in">

            <!-- SERVICE -->
            <div id="service" class="tokyo_tm_section animated">
                @if(!$whatIDos->isEmpty())
                    <div class="container">
                        <div class="tokyo_tm_services">
                            <div class="tokyo_tm_title">
                                <div class="title_flex">
                                    <div class="left">
                                        <span>Services</span>
                                        <h3>What I Do</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="list">
                                <ul>
                                    @foreach ($whatIDos as $whatIDo)
                                        <li>
                                            <div class="list_inner">
                                                <span class="number">01</span>
                                                <h3 class="title">{{ $whatIDo->title }}</h3>
                                                <p class="text">{!! $whatIDo->shortBody(10) !!}</p>
                                                <div class="tokyo_tm_read_more">
                                                    <a href="#"><span>Read More</span></a>
                                                </div>
                                                <a class="tokyo_tm_full_link" href="#"></a>

                                                <!-- Service Popup Start -->
                                                <img class="popup_service_image" src="{{ $whatIDo->getImage() }}" alt=""/>
                                                <div class="service_hidden_details">
                                                    <div class="service_popup_informations">
                                                        <div class="descriptions">
                                                            {!! $whatIDo->body !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Service Popup End -->
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                @if(!$partners->isEmpty())
                    <div class="tokyo_tm_partners">
                        <div class="container">
                            <div class="tokyo_section_title">
                                <h3>Partners</h3>
                            </div>
                            <div class="partners_inner">
                                <ul>
                                    @foreach ($partners as $partner)
                                        <li>
                                            <div class="list_inner">
                                                @if(!empty($partner->url))
                                                    <a href="{{ $partner->url }}">
                                                        <img src="{{ $partner->getImage() }}" alt=""/>
                                                    </a>
                                                @else
                                                    <img src="{{ $partner->getImage() }}" alt=""/>
                                                @endif
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                @if(!$facts->isEmpty())
                    <div class="tokyo_tm_facts">
                        <div class="container">
                            <div class="tokyo_section_title">
                                <h3>Fun Facts</h3>
                            </div>
                            <div class="list">
                                <ul>
                                    @foreach($facts as $fact)
                                        <li>
                                            <div class="list_inner">
                                                <h3>{{ $fact->number }}</h3>
                                                <span>{{ $fact->title }}</span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                @if(!$pricings->isEmpty())
                    <div class="tokyo_tm_pricing">
                        <div class="container">

                            <div class="tokyo_section_title">
                                <h3>Pricing</h3>
                            </div>
                            <div class="list">
                                <ul>
                                    @foreach($pricings as $pricing)
                                        <li>
                                            <div class="list_inner">
                                                <div class="price">
                                                    <h3>
                                                <span>{{ $pricing->price }}
                                                    <span class="currency">{{ $pricing->currency }}</span>
                                                </span>
                                                    </h3>
                                                </div>
                                                <div class="plan">
                                                    <h3>{{ $pricing->plan }}</h3>
                                                </div>
                                                <ul class="item">
                                                    @foreach($pricing->pricingItem()->get() as $pricingItem)
                                                        <li @if($pricingItem->item_is_active === 1) class="active" @endif >
                                                            <p>{{ $pricingItem->item }}</p>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <div class="tokyo_tm_button" data-position="left">
                                                    <a href="#">
                                                        <span>Purchase</span>
                                                    </a>
                                                </div>
                                                @if($pricing->popular === 1)
                                                    <span class="popular">Popular</span>
                                                @endif
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                @endif
            </div>
            <!-- /SERVICE -->
        </div>
    </div>
