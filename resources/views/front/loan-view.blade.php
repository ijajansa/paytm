@extends('layouts.app')
@section('content')
  <section class="content-header">
    <div class="container-fluid">
    @include('admin-layouts.flash')
      
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{$data->loan_name ?? ''}}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Lead View</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="card">
      <div class="card-header">
        <div class="row">
						<div class="col-10">
              <h3 class="card-title">Lead #{{10000 + $data->id}}</h3>
						</div>
						<div class="col-2">
            </div>
					</div>
        </div>
        
      </div>
      <div class="card-body p-0">
        <!-- <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Manage</h3>
              </div>
              <div class="card-body">
                <div class="row">
                                    <div class="col-md-6">
                    <div class="row">
                      <div class="col-12">
                        <strong>Assign to : </strong>
                        <span>Raj Shukla (PL)(#EMP-2116441)</span>
                        </div>
                      <div class="col-12">
                        <strong>Mobile : </strong>
                        <span><a href="tel:9318468625">9318468625</a></span>
                      </div>
                      <div class="form-group">
                        <div class="col">
                          </div>
                  	  </div>
                      </div>
                  </div>
                  <div class="col-md-12 text-right">
                    Gold Plan <i class="far fa-check-square text-success"></i>LOAN-LENDERS(R), <i class="far fa-check-square text-success"></i>MUDRA(R), <i class="far fa-check-square text-success"></i>HOOG-MONEY(R)                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
        <div class="row" id="profilehead">
          <div class="col-md-12">
            <div class="card-deck">
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{asset('dist/img/no-image.png')}}" alt="User profile picture">
                  </div>
                  <h3 class="profile-username text-center">{{$data->first_name ?? ''}} {{$data->middle_name ?? ''}} {{$data->last_name ?? ''}}</h3>
                  <div class="text-center">{{$data->email}}</div>
                  <div class="text-center"><strong>{{$data->loan_name ?? ''}}</strong> of<br>{{number_format($data->requested_amount)}} for {{$data->requested_duration}} Months</div>
                </div>
              </div>
              <div class="card card-primary card-outline">
                <div class="card-body">
                <i class="fas fa-mobile-alt"></i> <strong>Mobile : </strong><p class="text-muted">{{$data->mobile_number}}</p>
                  <hr>
                  <strong>PAN : </strong><p class="text-muted">{{$data->pan_number}}</p>
                  <hr>
                  <strong>D.O.B : </strong><p class="text-muted">{{date('Y-m-d',strtotime($data->dob))}}</p>
                </div>
              </div>
              <div class="card card-primary card-outline">
                <div class="card-body">
                <i class="fas fa-home"></i> <strong>Residence Pin : </strong><p class="text-muted">{{$data->residence_pincode}}</p>
                  <hr>
                  <i class="fas fa-home"></i> <strong>Permanent Pin : </strong><p class="text-muted">{{$data->permanent_pincode}}</p>
                  <hr>
                  <strong>D.O.B : </strong><p class="text-muted">{{date('Y-m-d',strtotime($data->dob))}}</p>
                </div>
              </div>
              <div class="card card-primary card-outline">
                <div class="card-body">
                  <strong>Company Type: </strong>{{$data->company_type ?? ''}}<hr>
                  <strong>Company: </strong>{{$data->company_name ?? ''}}<hr>
                  <strong>Employment Type: </strong>{{$data->employment_type ?? ''}}<hr>
                  <strong>Monthly Salary : </strong>Rs. {{number_format($data->income_salary)}}</div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">&nbsp;</div>
        </div>
        <div class="row">
						<div class="col-md-12">
							<div class="card card-primary">
								<div class="card-header">
                  <div class="row">
                    <div class="col-sm-6"><h3 class="card-title">Documents Check List</h3></div>
                    <div class="col-sm-6 text-right">
                                          </div>
                  </div>
								</div>
								<div class="card-body">
									<div class="row main-docs">
                                                                  <div class="col-md-3">
                          <div class="form-group required">
                            <div class="custom-file" id="p-458424">
                                                              <button type="submit" data-pid="p-458424" data-toggle="modal" data-target="#new_document_modal" data-docname = "43234_AADHAR_CARD_FRONT" class="btn btn-success col start doc-link">
                                  <i class="fas fa-upload"></i>
                                  <span>AADHAR_CARD_FRONT</span>
                                </button>
                                <p class="text-center text-sm">IN PDF </p>
                                                          </div>
                          </div>
                        </div>
                                              <div class="col-md-3">
                          <div class="form-group required">
                            <div class="custom-file" id="p-458425">
                                                              <button type="submit" data-pid="p-458425" data-toggle="modal" data-target="#new_document_modal" data-docname = "43234_AADHAR_CARD_BACK" class="btn btn-success col start doc-link">
                                  <i class="fas fa-upload"></i>
                                  <span>AADHAR_CARD_BACK</span>
                                </button>
                                <p class="text-center text-sm">IN PDF</p>
                                                          </div>
                          </div>
                        </div>
                                              <div class="col-md-3">
                          <div class="form-group required">
                            <div class="custom-file" id="p-458426">
                                                              <button type="submit" data-pid="p-458426" data-toggle="modal" data-target="#new_document_modal" data-docname = "43234_PAN_CARD" class="btn btn-success col start doc-link">
                                  <i class="fas fa-upload"></i>
                                  <span>PAN_CARD</span>
                                </button>
                                <p class="text-center text-sm">IN PDF</p>
                                                          </div>
                          </div>
                        </div>
                                              <div class="col-md-3">
                          <div class="form-group required">
                            <div class="custom-file" id="p-458427">
                                                              <button type="submit" data-pid="p-458427" data-toggle="modal" data-target="#new_document_modal" data-docname = "43234_SALARY_SLIP" class="btn btn-success col start doc-link">
                                  <i class="fas fa-upload"></i>
                                  <span>SALARY_SLIP</span>
                                </button>
                                <p class="text-center text-sm">JULY</p>
                                                          </div>
                          </div>
                        </div>
                                              <div class="col-md-3">
                          <div class="form-group required">
                            <div class="custom-file" id="p-458428">
                                                              <button type="submit" data-pid="p-458428" data-toggle="modal" data-target="#new_document_modal" data-docname = "43234_SALARY_SLIP" class="btn btn-success col start doc-link">
                                  <i class="fas fa-upload"></i>
                                  <span>SALARY_SLIP</span>
                                </button>
                                <p class="text-center text-sm">AUGUST</p>
                                                          </div>
                          </div>
                        </div>
                                              <div class="col-md-3">
                          <div class="form-group required">
                            <div class="custom-file" id="p-458429">
                                                              <button type="submit" data-pid="p-458429" data-toggle="modal" data-target="#new_document_modal" data-docname = "43234_SALARY_SLIP" class="btn btn-success col start doc-link">
                                  <i class="fas fa-upload"></i>
                                  <span>SALARY_SLIP</span>
                                </button>
                                <p class="text-center text-sm">SEPTEMBER</p>
                                                          </div>
                          </div>
                        </div>
                                              <div class="col-md-3">
                          <div class="form-group required">
                            <div class="custom-file" id="p-458430">
                                                              <button type="submit" data-pid="p-458430" data-toggle="modal" data-target="#new_document_modal" data-docname = "43234_1_PASSPORT_SIZE_PHOTO" class="btn btn-success col start doc-link">
                                  <i class="fas fa-upload"></i>
                                  <span>1_PASSPORT_SIZE_PHOTO</span>
                                </button>
                                <p class="text-center text-sm">IN PDF</p>
                                                          </div>
                          </div>
                        </div>
                                              <div class="col-md-3">
                          <div class="form-group required">
                            <div class="custom-file" id="p-458431">
                                                              <button type="submit" data-pid="p-458431" data-toggle="modal" data-target="#new_document_modal" data-docname = "43234_BANK_STATE_MENT_1_MARCH_2023_TO_TILL_DATE_OCT_2023_" class="btn btn-success col start doc-link">
                                  <i class="fas fa-upload"></i>
                                  <span>BANK_STATE_MENT_1_MARCH_2023_TO_TILL_DATE_OCT_2023_</span>
                                </button>
                                <p class="text-center text-sm">IN NETBANKING PDF FORMAT</p>
                                                          </div>
                          </div>
                        </div>
                                              <div class="col-md-3">
                          <div class="form-group required">
                            <div class="custom-file" id="p-458432">
                                                              <button type="submit" data-pid="p-458432" data-toggle="modal" data-target="#new_document_modal" data-docname = "43234_LOGIN_DETAIL_SHEET" class="btn btn-success col start doc-link">
                                  <i class="fas fa-upload"></i>
                                  <span>LOGIN_DETAIL_SHEET</span>
                                </button>
                                <p class="text-center text-sm">IN PDF</p>
                                                          </div>
                          </div>
                        </div>
                                              <div class="col-md-3">
                          <div class="form-group required">
                            <div class="custom-file" id="p-458433">
                                                              <button type="submit" data-pid="p-458433" data-toggle="modal" data-target="#new_document_modal" data-docname = "43234_FORM_-16_/_26_AS_/_OFFICAL_MAIL_ID" class="btn btn-success col start doc-link">
                                  <i class="fas fa-upload"></i>
                                  <span>FORM_-16_/_26_AS_/_OFFICAL_MAIL_ID</span>
                                </button>
                                <p class="text-center text-sm">IN PDF </p>
                                                          </div>
                          </div>
                        </div>
                                          						      </div>
								</div>
							</div>
						</div>
					</div>
        </div>
        <!-- <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Other Documents</h3>
              </div>
              <div class="card-body">
                <div class="row main-docs" id="other_document_container">
                                                                        </div>
                <div class="row">
                  <div class="col-md-3">
                    <br><br><br>
                    <div class="form-group required">
                      <div class="custom-file" id="other_document_button">
                        <button type="submit" data-pid="other_document" data-toggle="modal" data-target="#other_document_modal" data-doctype="Other Document" class="btn btn-success col start doc-link">
                          <i class="fas fa-upload"></i>
                          <span>Upload More Document</span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">  
            <div class="card-deck">
                            <div class="card card-primary">
                <div class="card-body text-center">
                                      <form id="review-form" method="post" class="row">
                      <div class="col-md-12 text-center">
                          <img src="/dist/img/review-this.gif" style="width:100%" alt="Review This Lead">
                          <input type="hidden" id="lead_id" name="file_id" value="43234">
                          <div id="emoji-Box" style="padding:10px">
                            <input type="radio" class="d-none rev" name="review" id="review1" value="1">
                            <label for="review1">
                              <img src="/dist/img/emojis/1.png" class="imgbgchk" style="width:32px" title="Very Bad" alt="Very Bad">
                            </label>

                            <input type="radio" class="d-none rev" name="review" id="review2" value="2">
                            <label for="review2">
                              <img src="/dist/img/emojis/2.png" class="imgbgchk" style="width:32px" title="Moderate" alt="Moderate">
                            </label>

                            <input type="radio" class="d-none rev" name="review" id="review3" value="3">
                            <label for="review3">
                              <img src="/dist/img/emojis/3.png" class="imgbgchk" style="width:32px" title="Average" alt="Average">
                            </label>

                            <input type="radio" class="d-none rev" name="review" id="review4" value="4">
                            <label for="review4">
                              <img src="/dist/img/emojis/4.png" class="imgbgchk" style="width:32px" title="Happy" alt="Happy">
                            </label>

                            <input type="radio" class="d-none rev" name="review" id="review5" value="5">
                            <label for="review5">
                              <img src="/dist/img/emojis/5.png" class="imgbgchk" style="width:32px" title="Awesome" alt="Awesome">
                            </label>
                          </div>
                          <label for="" class="form-lable" style="display:block;background-color:#f2f2f2;" id="selected-review"></label>
                          <textarea class="form-control" name="comment" id="reviewCommentBox" rows="3" placeholder="Comment" autocomplete="off"></textarea>
                      </div>
                      <div class="col-md-12">&nbsp;</div>
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-primary float-right" id="add-review">Submit Review</button>
                      </div>
                    </form>
                                  </div>
              </div>
            </div>
          </div>   
        </div> -->
        <div class="row">
          <div class="col-md-12">&nbsp;</div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="timeline" id="comment_container">
              <!-- comments Start -->
            
              <!-- comments Start -->
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
            <button type="submit" data-toggle="modal" data-target="#comment_status" class="btn btn-success col start doc-link">
            <span>Add Comment</span> <i class="fas fa-comment-alt"></i>
            </button>
            </div>
          </div>
        </div>


      </div>
    </div>
  </section>
</div>
<div class="modal fade" id="new_document_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="otherDocumentLable">Other Document</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="new_document_form" action="/index.php?path=document&method=upload" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <input type="text" class="form-control" id="document_name" name="document_name" placeholder="Enter Document name" value=""/>
            <input type="hidden" class="form-control" id="fid" name="document_fid" value="43234"/>
            <input type="hidden" class="form-control" id="pid" name="document_pid" value=""/>
            <input type="hidden" class="form-control" id="type" name="type" value="files"/>
            <input type="hidden" class="form-control" id="as" name="uploaded_as" value="0"/>
            <input type="file" accept="application/pdf,image/jpg,image/jpeg,image/png" name="image"/>
            <input type="text" class="form-control" id="password" name="password" placeholder="Password if any" value=""/>
            <input type="submit" class="btn btn-primary upload-btn" value="Upload">
            <span class="file-error" id="other_document_error"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="progress" style="width:100%;padding:5px;background-color:#f2f2f2">
          <div class="progress-bar"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="comment_status" tabindex="-1" role="dialog" aria-labelledby="status" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="status">Comment and Update lead status</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="comment_form" action="/index.php?path=lead&method=comment" method="post" enctype="multipart/form-data">
                        <div class="form-group">
              <label for="InputComment">Comment</label>
              <input type="hidden" name="file_id" value="43234">
              <textarea name="comment" class="form-control" id="InputComment" rows="3" autocomplete="off"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary upload-btn form-control" value="Post">
              <span class="file-error" id="CommentError"></span>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </section>
@endsection