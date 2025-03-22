@include('admin.header')
<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            @if(session('success'))
            <div class="alert alert-success mb-2">{{ session('success') }}</div>
            @endif
            <div class="mt-2 mb-4">
                <h1 class="title1 text-dark">Manage User Activities</h1>
            </div>
            <div>
            </div>
            <div>
            </div>
            <div class="mb-5 row">
                <div class="col-12">
                    <small class="text-dark">If you can't see some details, ensure the activity data is correctly
                        filled.</small>
                </div>
                <div class="col-12 card shadow p-4 bg-light">
                    <div class="table-responsive" data-example-id="hoverable-table">
                        <table id="ActivityTable" class="table table-hover text-dark">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th>Last Login At</th>
                                    <th>Last Login IP</th>
                                    <th>Last Login User Agent</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($activities as $activity)
                                <tr>
                                    <th scope="row">{{ $activity->id }}</th>
                                    <td>{{ $activity->user->name }}</td> <!-- Assuming relationship exists -->
                                    <td>{{ $activity->user->email }}</td> <!-- Assuming relationship exists -->
                                    <td>{{ \Carbon\Carbon::parse($activity->last_login_at)->format('D, M j, Y g:i A') }}
                                    </td>
                                    <td>{{ $activity->last_login_ip }}</td>
                                    <td>{{ $activity->last_login_user_agent }}</td>
                                    <td>
                                        <a href="{{ route('delete.activity', $activity->id) }}"
                                            class="btn btn-danger btn-sm m-1">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.footer')