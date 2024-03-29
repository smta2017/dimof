<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="posts-table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Contact Number</th>
                <th>User</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ strlen($post->description) > 512 ? substr($post->description, 0, 512) . '...' : $post->description }}</td>
                    <td>{{ $post->contact_phone_number }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                        <div class='btn-group' > 
                            <a href="{{ route('posts.show', [$post->id]) }}"
                               class='btn btn-info btn-xs'>
                                <i class="far fa-eye">View</i>
                            </a>
                            <a href="{{ route('posts.edit', [$post->id]) }}"
                               class='btn btn-success btn-xs'>
                                <i class="far fa-edit">Edit</i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt">Delete</i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
    <div class="float-right">
        <nav aria-label="Page navigation">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                @if ($posts->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">&laquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $posts->previousPageUrl() }}" rel="prev">&laquo;</a>
                    </li>
                @endif

                @foreach ($posts as $post)
                    @if (is_int($post))
                        <li class="page-item {{ $post == $posts->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $posts->url($post) }}">{{ $post }}</a>
                        </li>
                    @elseif (is_string($post))
                        <li class="page-item disabled"><span class="page-link">{{ $post }}</span></li>
                    @endif
                @endforeach

                @if ($posts->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $posts->nextPageUrl() }}" rel="next">&raquo;</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link">&raquo;</span>
                    </li>
                @endif
            </ul>
        </nav>
        </nav>
    </div>
</div>
</div>
