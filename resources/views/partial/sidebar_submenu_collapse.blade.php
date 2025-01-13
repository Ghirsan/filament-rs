{{-- Price --}}
<a href="" class="nav-link just" data-bs-toggle="collapse"data-bs-target="#submenu-price" aria-expanded="false"aria-controls="submenu">
    <span class="icon">
        <i class="bi bi-box-seam"></i>
    </span>
    <span class="description">
        <span>Price</span>
        <span><i class="bi bi-caret-down-fill"></i></span>
    </span>
</a>
{{-- submenu item --}}
<div class="sub-menu collapse" id="submenu-price">
    @foreach ($PriceCategory as $Column)
        <a href="" class="nav-link">
            <span class="icon">
                <i class="bi bi-file-earmark-check"></i>
            </span>
            <span class="description">
                {{ $Column -> name }}
            </span>
        </a>
    @endforeach
</div>

{{-- unit --}}
<a href="" class="nav-link" data-bs-toggle="collapse"data-bs-target="#submenu-unit" aria-expanded="false"aria-controls="submenu">
    <span class="icon">
        <i class="bi bi-box-seam"></i>
    </span>
    <span class="description">
        Unit <i class="bi bi-caret-down-fill"></i>
    </span>
</a>
{{-- submenu item --}}
<div class="sub-menu collapse" id="submenu-unit">
    @foreach ( $UnitCategory as $Column)
        <a href="" class="nav-link">
            <span class="icon">
                <i class="bi bi-file-earmark-check"></i>
            </span>
            <span class="description">
                {{ $Column->name }}
            </span>
        </a>
    @endforeach
</div>

{{-- Age --}}
<a href="" class="nav-link" data-bs-toggle="collapse"data-bs-target="#submenu-age" aria-expanded="false"aria-controls="submenu">
    <span class="icon">
        <i class="bi bi-box-seam"></i>
    </span>
    <span class="description">
        Age <i class="bi bi-caret-down-fill"></i>
    </span>
</a>
{{-- submenu item --}}
<div class="sub-menu collapse" id="submenu-age">
    @foreach ($AgeCategory as $Column)
        <a href="" class="nav-link">
            <span class="icon">
                <i class="bi bi-file-earmark-check"></i>
            </span>
            <span class="description">
                {{ $Column -> name }}
            </span>
        </a>
    @endforeach
</div>
