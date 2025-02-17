@include('admin.header')

<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            @if(session('message'))
            <div class="alert alert-success mb-2">{{ session('message') }}</div>
            @endif
            <div class="mt-2 mb-4">
                <h1 class="title1 text-dark">Add Trading Plan</h1>
            </div>
            <div class="mb-5 row">
                <div class="col-lg-12">
                    <div class="p-3 card bg-light">
                        <form action="{{ route('admin.store-trading-plan') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Plan Name</h5>
                                    <input class="form-control text-dark bg-light" placeholder="Enter Plan name"
                                        type="text" name="name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Minimum Amount ($)</h5>
                                    <input class="form-control text-dark bg-light" placeholder="Enter minimum amount"
                                        type="number" name="min_amount" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Maximum Amount ($)</h5>
                                    <input class="form-control text-dark bg-light" placeholder="Enter maximum amount"
                                        type="number" name="max_amount" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Investment Duration</h5>
                                    <input class="form-control text-dark bg-light"
                                        placeholder="Enter duration (e.g. 3 months)" type="text" name="duration"
                                        required>
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="submit" class="btn btn-primary" value="Add Plan">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')