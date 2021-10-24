<div class="block-quote {{ $block['className'] }}">
  <div class="block-quote__text">{!! get_field('blockquote') !!}</div>
  <div class="author">
    <div class="author__avatar">
      {!! wp_get_attachment_image(get_field('avatar')) !!}
    </div>
    <div>
      <div class="author__name">{!! get_field('fullname') !!}</div>
      <div class="author__function">{!! get_field('function') !!}</div>
    </div>
  </div>
</div>
