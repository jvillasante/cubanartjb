<div class="jumbotron">
  <div class="container-fluid">
    @if (count($slideshow))
      <div class="slideshow responsive"
        data-cycle-loader="wait"
        data-cycle-fx=carousel
        data-cycle-timeout=3000
        data-cycle-carousel-visible=3
        data-cycle-carousel-fluid=true
        data-cycle-log="false"
        >
          @foreach($slideshow as $image)
            @if ($image->number == 1)
              {{ HTML::image(HtmlHelpers::image_path($image->image_path, 'medium'), null, array('class' => 'cycle-slide first')) }}
            @else
              {{ HTML::image(HtmlHelpers::image_path($image->image_path, 'medium'), null, array('class' => 'cycle-slide')) }}
            @endif
          @endforeach
      </div>
    @endif
  </div>
</div>

