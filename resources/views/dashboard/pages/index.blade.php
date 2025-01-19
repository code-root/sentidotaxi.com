@extends('dashboard.layouts.footer')
@extends('dashboard.layouts.navbar')
@section('body')

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Pages </span><span>Management</span>
        </h4>

        <div class="app-ecommerce">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span>All Pages</span>
                                <div>
                                    <select id="languageSelect" class="form-select" aria-label="Select Language">
                                        <option value="en">English</option>
                                        <option value="ar">عربي</option>
                                    </select>
                                </div>
                                <a href="{{ route('dashboard.pages.create') }}" class="btn btn-primary" >Add New Page</a>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="pagesTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name </th>
                                            <th>meta</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pages as $page)
                                            <tr>
                                                <td>{{ $page->id }}</td>
                                                <td>{{ $page->name }}</td>
                                                <td >{{ $page->meta }}</td>
                                                <td>
                                                    <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-warning">Edit</a>
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
        </div>

    </div>
</div>

@section('footer')
<script>


</script>
@endsection
@endsection
