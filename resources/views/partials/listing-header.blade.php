<section class="listing-header">
    <div class="wrapper">
        <h2 class="listing-header__title">{!! $title !!}</h2>

        @if(isset($desc))
        <div class="listing-header__desc body-text body-text--weight-bold body-text--size-large">
            {{ $desc }}
        </div>
        @endif

    </div>
</section>