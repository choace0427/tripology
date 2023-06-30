@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Operator Detail</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary">Operator Details</h6>
                    <div class="float-right d-inline">
                        <a href="{{ route('admin.operator.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> View All</a>
                     </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            @if($operator_detail->photo)
                            <tr>
                                <td style='width:20%;'>Photo</td>
                                <td><img src="{{ asset('uploads/'.$operator_detail->photo) }}" alt="" class="w_200"></td>
                            </tr>
                            @endif
                            <tr>
                                <td>Name</td>
                                <td>{{ $operator_detail->name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $operator_detail->email }}</td>
                            </tr>
                            <tr>
                                <td>Company Name</td>
                                <td>{{ $operator_detail->company_name }}</td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>{{ $operator_detail->username }}</td>
                            </tr>
                            <tr>
                                <td>Website</td>
                                <td>{{ $operator_detail->website }}</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>{{ $operator_detail->phone }}</td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td>{{ $operator_detail->city }}</td>
                            </tr>
                            <tr>
                                <td>Country</td>
                                <td>{{ $operator_detail->country }}</td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>{{ $operator_detail->description }}</td>
                            </tr>
                            <tr>
                                <td>Company Legal Name</td>
                                <td>{{ $operator_detail->company_legal_name }}</td>
                            </tr>
                            <tr>
                                <td>Head Office Location</td>
                                <td>{{ $operator_detail->head_office_location }}</td>
                            </tr>
                            <tr>
                                <td>Address 1</td>
                                <td>{{ $operator_detail->address_1 }}</td>
                            </tr>
                            <tr>
                                <td>Address 2</td>
                                <td>{{ $operator_detail->address_2 }}</td>
                            </tr>
                            <tr>
                                <td>What is your base curreny?</td>
                                <td>{{ $operator_detail->base_currency }}</td>
                            </tr>

                            <tr>
                                <td>Which of the following best describes your company?</td>
                                <td>{{ $operator_detail->best_describe_your_company }}</td>
                            </tr>
                            <tr>
                                <td>How do you sell your adventures?</td>
                                <td>{{ $operator_detail->sell_your_adventures }}</td>
                            </tr>

                            <tr>
                                <td>Are all your adventures 3 days or longer?</td>
                                <td>{{ $operator_detail->adventures_days }}</td>
                            </tr>
                            <tr>
                                <td>How will you load adventure information to Tripology?</td>
                                <td>{{ $operator_detail->adventure_info }}</td>
                            </tr>
                            <tr>
                                <td>Do you employ your own guides?</td>
                                <td>{{ $operator_detail->employee_own_guides }}</td>
                            </tr>
                            <tr>
                                <td>Do you own your own transport?</td>
                                <td>{{ $operator_detail->own_transport }}</td>
                            </tr>
                            <tr>
                                <td>Do your own your own hotels?</td>
                                <td>{{ $operator_detail->own_hotels }}</td>
                            </tr>
                            <tr>
                                <td>Email Address</td>
                                <td>{{ $operator_detail->email_address }}</td>
                            </tr>
                            <tr>
                                <td>Where is your location?</td>
                                <td>{{ $operator_detail->location }}</td>
                            </tr>
                            <tr>
                                <td>What are you operation hours?</td>
                                <td>{{ $operator_detail->operation_hours }}</td>
                            </tr>

                            <tr>
                                <td>Status</td>
                                <td>{{ ($operator_detail->status) ? 'Active' : 'Pending' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection