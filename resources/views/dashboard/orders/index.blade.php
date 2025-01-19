@extends('dashboard.layouts.footer')
@extends('dashboard.layouts.navbar')
@section('body')

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y" style="max-width: 95% !important;!i;!in;!i;!;">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Orders</span>
        </h4>
        <div class="card">
            <div class="card-header">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="card-header flex-column flex-md-row">
                        <div class="head-label text-center">
                            <h5 class="card-title mb-0">Data Table Orders</h5>
                        </div>
                    </div>
                    <table id="data-x" class="table border-top dataTable dtr-column">
                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile Number</th>
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
                                        <!-- Loop through form submissions and display data -->
                                        @foreach($data as $index => $submission)
                                            <tr>
                                                <td>{{ $index + 1 }}</td> <!-- Row Number -->
                                                <td>{{ $submission->name }}</td> <!-- Submitter's Name -->
                                                <td>{{ $submission->email }}</td> <!-- Submitter's Email -->
                                                <td>{{ $submission->mobile_number }}</td> <!-- Submitter's Mobile Number -->
                                                <td>{{ $submission->arrival_date }}</td> <!-- Arrival Date -->
                                                <td>{{ $submission->landing_time }}</td> <!-- Landing Time -->
                                                <td>{{ $submission->flight_number }}</td> <!-- Flight Number -->
                                                <td>{{ $submission->number_of_people }}</td> <!-- Number of People -->
                                                <td>{{ $submission->vehicle }}</td> <!-- Vehicle -->
                                                <td>{{ $submission->destination_hotel }}</td> <!-- Destination Hotel -->
                                                <td>{{ $submission->return_transfer }}</td> <!-- Return Transfer -->
                                                <td>{{ $submission->sim_card }}</td> <!-- SIM Card -->
                                                <td>{{ $submission->sim_card_option }}</td> <!-- SIM Card Option -->
                                                <td>{{ $submission->sim_card_g }}</td> <!-- SIM Card G -->
                                                <td>{{ $submission->message }}</td> <!-- Additional Message -->
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @section('footer')
            <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
            <script>
                $(document).ready(function() {
                    // Initialize DataTable
                    var table = $('#data-x').DataTable({
                        processing: true,
                        serverSide: false, // Set to true if using server-side processing
                        paging: true, // Enable pagination
                        searching: true, // Enable search
                        ordering: true, // Enable sorting
                        responsive: true, // Enable responsive design
                    });
                });
            </script>
            @endsection
            @endsection
