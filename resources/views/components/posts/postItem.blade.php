<li class="list-group-item">
    <ul class="media-list">
        <li class="media">
            <div class="media-left">
                <a href="#">
                    <img class="media-object" src="https://dummyimage.com/50" alt="...">
                </a>
            </div>
            <div class="media-body">
                <h6 class="media-heading">{{ $post->author->name }} <b>( {{ $post->created_at->formatLocalized('%A, %d %B %Y') }} )</b></h6>
                <div class="well">
                    {{ $post->content }}
                </div>
                <a href="javascript:void(0);" class="pull-right">Comenteaza</a>
            </div>
      </li>
    </ul>
</li>
