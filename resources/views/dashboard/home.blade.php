@extends('dashboard.layouts.footer')

@extends('dashboard.layouts.navbar')
@section('title')
    {{ 'Home' }}
@endsection
@section('page-title')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection
@section('body')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="container">
                <h2>Statistics</h2>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Orders</h5>
                                <p class="card-text">{{ $totalOrders }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Views</h5>
                                <p class="card-text">{{ $totalViews }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Services</h5>
                                <p class="card-text">{{ $services }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Sales Percentage Change</h5>
                                <p class="card-text">{{ number_format($salesPercentage, 2) }}%</p>
                            </div>
                        </div>
                    </div>
                </div>

                <h2 class="mt-5">Orders by Device Type</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Device Type</th>
                            <th>Order Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($deviceOrders as $deviceOrder)
                            <tr>
                                <td>{{ $deviceOrder->device_type }}</td>
                                <td>{{ $deviceOrder->total }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <h2 class="mt-5">Subscribers List</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Email</th>
                            <th>Subscription Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subscribers as $index => $subscriber)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $subscriber->email }}</td>
                                <td>{{ $subscriber->created_at->format('Y-m-d H:i:s') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <h2 class="mt-5">Orders</h2>
                <table id="formSubmissionsTable" class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Arrival Date</th>
                            <th>Landing Time</th>
                            <th>Flight Number</th>
                            <th>Number of People</th>
                            <th>Vehicle</th>
                            <th>Destination Hotel</th>
                            <th>Return Transfer</th>
                            <th>SIM Card</th>
                            <th>SIM Card Option</th>
                            <th>SIM Card G</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($formSubmissions as $index => $submission)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $submission->name }}</td>
                                <td>{{ $submission->email }}</td>
                                <td>{{ $submission->mobile_number }}</td>
                                <td>{{ $submission->arrival_date->format('Y-m-d') }}</td>
                                <td>{{ $submission->landing_time }}</td>
                                <td>{{ $submission->flight_number }}</td>
                                <td>{{ $submission->number_of_people }}</td>
                                <td>{{ $submission->vehicle }}</td>
                                <td>{{ $submission->destination_hotel }}</td>
                                <td>{{ $submission->return_transfer }}</td>
                                <td>{{ $submission->sim_card }}</td>
                                <td>{{ $submission->sim_card_option }}</td>
                                <td>{{ $submission->sim_card_g }}</td>
                                <td>{{ $submission->message }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <h2 class="mt-5">Charts</h2>
                <div class="row">
                    <div class="col-md-6">
                        <canvas id="ordersChart"></canvas>
                    </div>
                    <div class="col-md-6">
                        <form id="filter-form" method="GET" action="">
                            <label for="filter">Filter by:</label>
                            <select name="filter" id="filter" class="form-control">
                                <option value="month" {{ $filter == 'month' ? 'selected' : '' }}>Month</option>
                                <option value="day" {{ $filter == 'day' ? 'selected' : '' }}>Day</option>
                            </select>
                            <button type="submit" class="btn btn-primary mt-2">Apply Filter</button>
                        </form>
                        <canvas id="topServicesChart" class="mt-4"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer-script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#ordersTable').DataTable();

        var ctx = document.getElementById('ordersChart').getContext('2d');
        var ordersChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($deviceOrders->pluck('device_type')),
                datasets: [{
                    label: 'Orders by Device Type',
                    data: @json($deviceOrders->pluck('total')),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var topServicesCtx = document.getElementById('topServicesChart').getContext('2d');
        var topServicesChart = new Chart(topServicesCtx, {
            type: 'bar',
            data: {
                labels: @json($serviceNames),
                datasets: [{
                    label: 'Top Selling Services',
                    data: @json($topServices->pluck('total')),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endsection
