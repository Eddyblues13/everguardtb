@include('admin.header')
<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            @if(session('success'))
            <div class="alert alert-success mb-2">{{ session('success') }}</div>
            @endif
            <div class="mt-2 mb-4">
                <h1 class="title1 text-dark">Manage Transfer Histories</h1>
            </div>
            <div class="mb-5 row">
                <div class="col-12 card shadow p-4 bg-light">
                    <div class="table-responsive" data-example-id="hoverable-table">
                        <table id="TransferTable" class="table table-hover text-dark">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Currency</th>
                                    <th>From Account</th>
                                    <th>Status</th>
                                    <th>Completed At</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transfers as $transfer)
                                <tr>
                                    <th scope="row">{{ $transfer->id }}</th>
                                    <td>{{ $transfer->user->name }}</td> <!-- Assuming relationship exists -->
                                    <td>{{ $transfer->user->email }}</td> <!-- Assuming relationship exists -->
                                    <td>{{ $transfer->type }}</td>
                                    <td>{{ number_format($transfer->amount, 2) }}</td>
                                    <td>{{ $transfer->currency }}</td>
                                    <td>{{ $transfer->from_account }}</td>
                                    <td>{{ $transfer->status }}</td>
                                    <td>{{ $transfer->completed_at ?
                                        \Carbon\Carbon::parse($transfer->completed_at)->format('D, M j, Y g:i A') :
                                        'N/A' }}</td>
                                    <td>
                                        @if($transfer->status == 'pending')
                                        <a href="{{ route('approve.transfer', $transfer->id) }}"
                                            class="btn btn-success btn-sm m-1">Approve</a>
                                        <a href="{{ route('decline.transfer', $transfer->id) }}"
                                            class="btn btn-warning btn-sm m-1">Decline</a>
                                        @endif
                                        <a href="{{ route('delete.transfer', $transfer->id) }}"
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