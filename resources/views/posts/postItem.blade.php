<li class="list-group-item">
    <ul class="media-list">
        <li class="media">
            <div class="media-left">
                <a href="#">
                    <img class="media-object" src="..." alt="...">
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading">{{ $post->author->name }} a inceput o conversatie ( {{ $post->created_at->diffForHumans() }} )</h4>
                <div class="well">
                    {{ $post->content }}
                </div>
                <a href="javascript:void(0);" class="pull-right">Comenteaza</a>
            </div>
      </li>
    </ul>
</li>
