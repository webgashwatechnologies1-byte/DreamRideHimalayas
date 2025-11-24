<section class="terms-condition">
    <div class="tf-container">

        {{-- MAIN TITLE --}}
        @if(!empty($content['title']))
            <h1 class="text-center mb-4">{{ $content['title'] }}</h1>
        @endif

        <div class="row">
            <div class="col-lg-12">

                <div class="d-flex align-items-start tab-terms-condition">

                    {{-- LEFT SIDEBAR TABS --}}
                    <div class="nav flex-column nav-pills bg-1" id="tc-tabs" role="tablist">
                        @foreach(($content['cards'] ?? []) as $i => $card)
                            <button class="nav-link {{ $i==0 ? 'active' : '' }}"
                                    id="tc-tab-{{ $i }}"
                                    data-bs-toggle="pill"
                                    data-bs-target="#tc-pane-{{ $i }}"
                                    type="button"
                                    role="tab">
                                {{ $card['name'] ?? 'Untitled' }}
                            </button>
                        @endforeach
                    </div>

                    {{-- RIGHT SIDE CONTENT --}}
                    <div class="tab-content flex-grow-1" id="tc-tabContent">

                        @foreach(($content['cards'] ?? []) as $i => $card)
                            <div class="tab-pane fade {{ $i==0 ? 'show active' : '' }}"
                                 id="tc-pane-{{ $i }}"
                                 role="tabpanel">

                                <div class="content mb-50">
                                   
                                    <div class="text mt-2" >{!! $card['description'] !!}</div>
                                </div>

                            </div>
                        @endforeach

                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
