<div class="share">
  <div class="share-options">
    <div class="share-channel">
      <a href="mailto:?&subject=I thought you might find this interesting!&body={!! App::postTitle(); !!}%0A%0A{!! get_the_permalink(); !!}" class="email" onclick="ga('send', 'event', 'social', 'share', 'email');"><i class="fas fa-envelope"></i><span class="sr-only">{!! _e('Share via email','sage'); !!}</span></a>
    </div>
    <div class="share-channel">
      <a href="https://twitter.com/intent/tweet?text={!! urlencode(App::postTitle()); !!}&url={!! get_the_permalink(); !!}&via={!! App::get_field('twitter_handle', 'option') !!}" class="twitter" onclick="ga('send', 'event', 'social', 'share', 'twitter');" target="_blank"><i class="fab fa-twitter"></i><span class="sr-only">{!! _e('Share on twitter','sage'); !!}</span></a>
    </div>
    <div class="share-channel">
      <a href="https://www.facebook.com/sharer/sharer.php?u={!! get_the_permalink(); !!}" target="_blank" class="facebook" onclick="ga('send', 'event', 'social', 'share', 'facebook');"><i class="fab fa-facebook-f"></i><span class="sr-only">{!! _e('Share on Facebook','sage'); !!}</span></a>
    </div>
  </div>
</div>
