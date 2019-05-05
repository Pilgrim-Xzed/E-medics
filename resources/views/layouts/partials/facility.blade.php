<div class="col-md-4">
    <div class="strip grid">
        <figure>
            <a href="#0" class="wish_bt"></a>
            <a href="{{ route('show_facility', $facility->slug) }}"><img src="img/hospital.jpg" class="img-fluid" alt="">
                <div class="read_more"><span>View Facility</span></div>
            </a>
            <small>{{ $facility->ward_code }}</small>
        </figure>
        <div class="wrapper">
            <h3><a href="{{ route('show_facility', $facility->slug) }}">{{ $facility->name }}</a></h3>
            <small>{{ $facility->ward_name }}, {{ $facility->state_name }}</small><br>
            {{-- <p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p> --}}
            <a class="address" href="https://www.google.com/maps/dir//{{ $facility->latitude . ',' .  $facility->longitude}}" target="_blank">Get directions</a>
        </div>
        <ul>
            <li><span class="loc_open">{{ $facility->type }}</span></li>
            <li>
                <div class="score"><span>Good<em>{{ $facility->reviews->count() }} Reviews</em></span><strong>{{ $facility->rate }}</strong></div>
            </li>
        </ul>
    </div>
</div>