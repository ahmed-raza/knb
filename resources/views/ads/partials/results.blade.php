@if(count($ads))
  @foreach($ads as $ad)
    <div class="row ad-row">
      @unless($ad->images->isEmpty())
        <div class="col-lg-4">
          <img src="data:image/jpeg;base64,{{ base64_encode(CustomHelper::getPath($ad->images[0], 'thumb')) }}" alt="Ad Image" class="ad-thumb img-thumbnail img-responsive">
        </div>
      @endunless
      <div class="{!! ($ad->images->isEmpty() ? 'col-lg-12' : 'col-lg-8') !!}">
        <h2><a href="{{ route('ads.show', $ad->id) }}">{{ $ad->title }}</a></h2>
        <p><em>{{ $ad->created_at->diffForHumans() }}</em></p>
        <p><strong>Price: </strong>{{ $ad->car_price }} PKR</p>
        <p><strong>Make: </strong>{{ $ad->car_make }}</p>
        <p><strong>Model: </strong>{{ $ad->car_model }}</p>
        {!! str_limit($ad->description, 350) !!}
      </div>
    </div>
    <hr class="margin">
  @endforeach
  {!! $ads->render() !!}
  <script type="text/javascript">
    $(function() {
      $('.pagination a').click(function(e) {
          e.preventDefault();

          $('#load a').css('color', '#dfecf6');
          $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="images/throbber.gif" />');

          var url = $(this).attr('href');
          getArticles(url);
          window.history.pushState("", "", url);
      });

      function getArticles(url) {
          $.ajax({
              url : url
          }).done(function (data) {
            $('.ads').attr('id', 'results');
            $('#results').html(data);
          }).fail(function () {
              alert('Articles could not be loaded.');
          });
      }
    });
  </script>
@else
  <div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Uh oh!</strong> <p>No results match your search.</p>
  </div>
@endif
