<i class="fa fa-user"></i> <a href="/user/{{ $article->user->id }}">{{ $article->user->name }}</a>
<i class="fa fa-eye"></i> {{ $article->view_count }} views
<i class="fa fa-calendar"></i> {{ $article->created_at->diffForHumans() }}
@can('update', $article)
    <i class="fa fa-edit"></i> <a href="/article/{{ $article->id }}/edit">Update</a>
@endcan