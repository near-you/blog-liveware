<!-- MOBILE MENU -->
<div class="tokyo_tm_topbar">
    <div class="topbar_inner">
        <div class="logo" data-type="image">
            <!-- You can use image or text as logo. data-type values are "image" and "text" -->
            <a href="#">
                <img src="{{asset('image/logo/logo.png')}}" alt=""/>
                <h3>TOKYO</h3>
            </a>
        </div>
        <div class="trigger">
            <div class="hamburger hamburger--slider">
                <div class="hamburger-box">
                    <div class="hamburger-inner"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="tokyo_tm_mobile_menu">
    <div class="menu_list">
        <ul class="transition_link">
            <li class="active"><a href="/" wire:navigate>Home</a></li>
            <li><a href="/about" wire:navigate>About</a></li>
            <li><a href="/service" wire:navigate>Service</a></li>
            <li><a href="/portfolio" wire:navigate>Portfolio</a></li>
            <li><a href="/news" wire:navigate>News</a></li>
            <li><a href="/contact" wire:navigate>Contact</a></li>
        </ul>
    </div>
</div>
<!-- /MOBILE MENU -->