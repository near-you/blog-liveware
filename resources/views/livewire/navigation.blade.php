<!-- LEFTPART -->
<div class="leftpart">
    <div class="leftpart_inner">
        @include('livewire.logo')
        <div class="menu">
             @livewire('menuItems')
        </div>
        @include('livewire.copyright')
    </div>
</div>
<!-- /LEFTPART -->

<!-- MOBILE MENU -->
<div class="tokyo_tm_topbar">
    <div class="topbar_inner">
        @include('livewire.logo')
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
        @livewire('menuItems')
    </div>
</div>
<!-- /MOBILE MENU -->
