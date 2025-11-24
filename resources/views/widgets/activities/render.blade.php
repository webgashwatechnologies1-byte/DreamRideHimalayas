@php
$title  = $content['title'] ?? '';
$bg     = $content['backImage'] ?? '';
$cards  = $content['cards'] ?? [];
$wid = "widget-" . $section->id; 

@endphp

<link rel="stylesheet" href="/app/css/app.css">
<link rel="stylesheet" type="text/css" href="/app/css/magnific-popup.css">
<link rel="stylesheet" type="text/css" href="/app/css/jquery.fancybox.min.css">
<link rel="stylesheet" type="text/css" href="/app/css/textanimation.css">

<style>
/* ------------------------------ */
/* TAB CARD BASE DESIGN           */
/* ------------------------------ */
#{{ $wid }} .nav-tabs-activities {
    border-bottom: none !important;
    gap: 20px;
}
#{{ $wid }} .textactivities{
    color: #aaaaaa !important;
}
#{{ $wid }} .nav-tabs-activities .nav-item {
    list-style: none;
}

#{{ $wid }} .nav-tabs-activities .nav-link {
    background: #ffffff;
    border-radius: 14px;
    padding: 30px 25px;
    min-width: 200px;
    min-height: 180px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 18px;
    border: 1px solid #e8e8e8;
    font-weight: 600;
    color: #1a1a1a;
    text-align: center;
    position: relative;
    transition: 0.3s ease;
}

/* Icon inside */
#{{ $wid }} .nav-tabs-activities .nav-link .icon img {
    width: 65px;
    height: 65px;
    object-fit: contain;
}

/* ------------------------------ */
/* ACTIVE STATE (YELLOW BOX)      */
/* ------------------------------ */
#{{ $wid }} .nav-tabs-activities .nav-link.active {
    background: #ffc727;
    border-color: #ffc727;
    color: #ffffff;
}

/* WHITE ICON IN ACTIVE TABS (optional) */
#{{ $wid }} .nav-tabs-activities .nav-link.active .icon img {
    filter: brightness(0) invert(1); /* turns icon white like screenshot */
}

/* TRIANGLE POINTER UNDER ACTIVE TAB */
#{{ $wid }} .nav-tabs-activities .nav-link.active::after {
    content: "";
    position: absolute;
    bottom: -12px;
    left: 50%;
    transform: translateX(-50%);
    width: 0;
    height: 0;
    border-left: 12px solid transparent;
    border-right: 12px solid transparent;
    border-top: 12px solid #ffc727;
}

/* ------------------------------ */
/* RESPONSIVE                     */
/* ------------------------------ */
@media(max-width: 992px) {
    #{{ $wid }} .nav-tabs-activities .nav-link {
        min-width: 160px;
        min-height: 150px;
        padding: 25px;
    }

    #{{ $wid }} .nav-tabs-activities .nav-link .icon img {
        width: 55px;
        height: 55px;
    }
}

@media(max-width: 576px) {
    #{{ $wid }} .nav-tabs-activities {
        flex-wrap: wrap;
        gap: 15px;
    }

    #{{ $wid }} .nav-tabs-activities .nav-link {
        min-width: 48%;
    }
}

</style>

<section class="relative tf-widget-activities pd-main overflow-hidden">

    <img src="/assets/images/page/mask-activiti.png" class="mask-top" alt="">
    <img src="/storage/{{ $bg }}" class="mask-bottom" alt="">

    <div class="tf-container">
        <div class="row z-index3 relative">

            <div class="col-lg-12 mb-60">
                <div class="clip-text textactivities">{{ $title }}</div>
            </div>

            <div class="col-lg-12">
                <ul class="nav nav-tabs-activities justify-content-center" id="myTablist" role="tablist">

                    @foreach($cards as $i => $c)

                        <li class="nav-item square" role="presentation">
                            <button class="nav-link {{ $i==0 ? 'active' : '' }}"
                                id="tab-{{ $i }}"
                                data-bs-toggle="tab"
                                data-bs-target="#tab-pane-{{ $i }}"
                                type="button" role="tab"
                                aria-controls="home-tab-pane"
                                aria-selected="true">

                                <span class="icon">
                                    <img src="/storage/{{ $c['image'] }}">
                                </span>

                                <span>{{ $c['heading'] }}</span>
                            </button>
                        </li>

                    @endforeach

                </ul>
            </div>

        </div>
    </div>

</section>
