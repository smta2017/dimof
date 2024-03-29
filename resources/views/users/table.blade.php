<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="users-table">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Mobile Verified At</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->mobile }}</td>
                    <td>{{ $user->mobile_verified_at }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                        <div class='btn-group' > 
                            <a href="{{ route('users.show', [$user->id]) }}"
                               class='btn btn-info btn-xs'>
                                <i class="far fa-eye">View</i>
                            </a>
                            <a href="{{ route('users.edit', [$user->id]) }}"
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
                @if ($users->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">&laquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $users->previousPageUrl() }}" rel="prev">&laquo;</a>
                    </li>
                @endif

                @foreach ($users as $user)
                    @if (is_int($user))
                        <li class="page-item {{ $user == $users->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $users->url($user) }}">{{ $user }}</a>
                        </li>
                    @elseif (is_string($user))
                        <li class="page-item disabled"><span class="page-link">{{ $user }}</span></li>
                    @endif
                @endforeach

                @if ($users->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $users->nextPageUrl() }}" rel="next">&raquo;</a>
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
