@extends('layouts.nonAuthApp')
@section('style')
<style type="text/css">
    .card-default {
        color: #333;
        background: linear-gradient(#fff,#ebebeb) repeat scroll 0 0 transparent;
        font-weight: 600;
        border-radius: 6px;
    }
</style>

@endsection
@section('content')
<div class="container-fluid" style="margin-top:20px;padding-bottom:100px;">
    {{-- main content --}}
    <div class="container" style="margin-top:20px;max-width:1000px;">
        <div id="accordion">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h3>Application Form</h3>
                    </div>
                </div>
            </div>
            <div class="card card-default" style="margin-top:50px;">
                <div class="card-header">
                    <h4 class="card-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                            <i class="glyphicon glyphicon-search text-gold"></i>
                            {{-- <b>SECTION I: TO BE COMPLETED BY APPLICANT</b> --}}
                        </a>
                    </h4>
                </div>
                <div id="collapse1" class="collapse show">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-1 col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">First Name</label>
                                    <input type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Last Name</label>
                                    <input type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Last Name</label>
                                    <input type="text" class="form-control" />
                                </div>
                            </div>
                            
                        </div>
        
                        <div class="row">
                            <div class="col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Mailing Address</label>
                                    <input type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-2 col-lg-3">
                                <div class="form-group">
                                    <label class="control-label">City</label>
                                    <input type="text" class="form-control" />
                                </div>
                            </div>
        
                            <div class="col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label class="control-label">State</label>
                                    <input type="text" class="form-control" />
                                </div>
                            </div>
        
                            <div class="col-md-3 col-lg-2">
                                <div class="form-group">
                                    <label class="control-label">Phone Number</label>
                                    <input type="text" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Choose program Level</label>
                                    <select class="form-control">
                                        <option>-- Please select --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Choose program Type</label>
                                    <select class="form-control">
                                        <option>-- Please select --</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Choose Collage</label>
                                    <select class="form-control">
                                        <option>-- Please select --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Choose field of study</label>
                                    <select class="form-control">
                                        <option>-- Please select --</option>
                                    </select>
                                </div>
                            </div>
                        </div>
        
                        <div class="row">
                            <div class="col-md-3 col-lg-12">
                                <div class="form-group">
                                    <label class="control-label">Gender</label><br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="gender">Male
                                        </label>
                                      </div>
                                      <div class="form-check-inline">
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Female
                                        </label>
                                      </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="control-label">Attach file below:</label>
                                <input type="file" class="form-control-file border">
                            </div>
                        </div>
                        <div class="row" style="margin-top:40px;">
                            <div class="col-sm-12 text-right">
                                <button class="btn btn-danger" style="width:100px;">Back</button>
                                <button class="btn btn-success" style="width:100px;">Submit</button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

