@extends('admin-layouts.app')
@section('content')
<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">View Agent Details</h3>

                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">

                    <div class="card card-bordered card-preview">
                        <div class="card-inner">
                            <form method="POST" action="{{url('agents/edit')}}/{{$data->id}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-4">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name-1">Full Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control @error('full_name') is-invalid @enderror" value="{{ $data->full_name }}" name="full_name" placeholder="" id="full-name-1">
                                                @error('full_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name-1">Gender</label>
                                            <div class="form-control-wrap">
                                                <select class="form-control form-select @error('gender') is-invalid @enderror" name="gender">
                                                    <option value="Male" @if($data->gender=='Male') selected @endif>Male</option>
                                                    <option value="Female" @if($data->gender=='Female') selected @endif>Female</option>
                                                </select>
                                                @error('gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name-1">Date Of Birth</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control @error('dob') is-invalid @enderror" value="{{ $data->dob }}" name="dob" placeholder="" id="full-name-1">
                                                @error('dob')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name-11">Address</label>
                                        <div class="form-control-wrap">
                                            <textarea rows="4" class="form-control @error('address') is-invalid @enderror" name="address"  id="full-name-11" placeholder="Residence Address">{{old('address',$data->address)}}</textarea>
                                            @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name-1">Street</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control @error('street') is-invalid @enderror" value="{{ $data->street }}" name="street" placeholder="" id="full-name-1">
                                                @error('street')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="full-name-1">State</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control @error('state') is-invalid @enderror" value="{{ $data->state }}" name="state" placeholder="" id="full-name-1">
                                                @error('state')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name-1">City</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control @error('city') is-invalid @enderror" value="{{ $data->city }}" name="city" placeholder="" id="full-name-1">
                                                @error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="full-name-1">Pincode</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control @error('pincode') is-invalid @enderror" value="{{ $data->pincode }}" name="pincode" placeholder="" id="full-name-1">
                                                @error('pincode')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <hr>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name-1">Agent ID</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control @error('agent_id') is-invalid @enderror" readonly value="{{ $data->agent_id }}" name="agent_id" placeholder="" id="full-name-1">
                                                @error('agent_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name-1">Email</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ $data->email }}" name="email" placeholder="" id="full-name-1">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name-1">Mobile Number</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control @error('mobile_number') is-invalid @enderror" value="{{ $data->mobile_number }}" name="mobile_number" placeholder="" id="full-name-1">
                                                @error('mobile_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name-1">Aadhar Number</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control @error('aadhar_number') is-invalid @enderror" value="{{ $data->aadhar_number }}" name="aadhar_number" placeholder="" id="full-name-1">
                                                @error('aadhar_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name-1">PAN Number</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control @error('pan_number') is-invalid @enderror" value="{{ $data->pan_number }}" name="pan_number" placeholder="" id="full-name-1">
                                                @error('pan_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name-1">Password</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control @error('visible_password') is-invalid @enderror" value="{{ $data->visible_password }}" name="visible_password" placeholder="" id="full-name-1">
                                                @error('visible_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <hr>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name-1">Bank Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control @error('bank_name') is-invalid @enderror" value="{{ $data->bank_name }}" name="bank_name" placeholder="" id="full-name-1">
                                                @error('bank_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name-1">Accountant Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control @error('accountant_name') is-invalid @enderror" value="{{ $data->accountant_name }}" name="accountant_name" placeholder="" id="full-name-1">
                                                @error('accountant_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name-1">Account Number</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control @error('account_number') is-invalid @enderror" value="{{ $data->account_number }}" name="account_number" placeholder="" id="full-name-1">
                                                @error('account_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name-1">IFSC Code</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control @error('ifsc_code') is-invalid @enderror" value="{{ $data->ifsc_code }}" name="ifsc_code" placeholder="" id="full-name-1">
                                                @error('ifsc_code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- .card-preview -->
                </div> <!-- nk-block -->
            </div>
        </div>
    </div>
</div>

@endsection
