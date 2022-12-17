@extends('admin.layout')
@section('content')

<div class="container bg-white mt-3 rounded-2 p-4">
      <div class="row mt-2">
            <div class="col-lg-3">
                <div class="mb-3">
                     <h4 class="title"> لیست کاربران </h4>
                </div>
            </div>
            <div class="col-lg-9 text-end">
                <button type="button" class="btn btn-sm btn-warning" id="" data-bs-target="#editingUser" data-bs-toggle="modal"> ویرایش <i class="fa fa-edit"></i> </button> &nbsp;
                <button type="button" class="btn btn-sm btn-danger" id="deletingUser"> حذف <i class="fa fa-trash"></i> </button>
            </div>
        </div>

    <div class="row">
        <div class="col-lg-12 ">
            <input type="hidden" id="">
            <table class="table table-bordered select-highlight evisaDataTable">
              <thead>
                    <tr class="docsTr">
                        <th> ردیف </th>
                        <th> نام و نام خانوادگی  </th>
                        <th> شماره تماس </th>
                        <th> نوع کاربر </th>
                        <th> آدرس </th>
                        <th> انتخاب </th>
                    </tr>
                </thead>
                <tbody id="">
                       <tr class="docsTr"  onclick="selectTableTr(this)">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <span class="form-check">
                                    <input class="form-check-input " type="radio" name="" id="" value="">
                                </span>
                            </td>
                     </tr>
                </tbody>
             </table>
        </div>
    </div>
 </div>

    
  <!--- modal for editing docs list -->
  <div class="modal" id="editingUser" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel">
            <div class="modal-dialog modal-dialog-scrollable modal-lg ">
                <div class="modal-content">
                    <div class="modal-header">
						<button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                        <h5 class="modal-title" id="exampleModalLabel"> ویرایش کاربر </h5>
                    </div>
                         <div class="modal-body">
                         <form action="{{url('/')}}" method="Post" enctype="multipart/form-data" >
                          
                            <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="email"> نام و نام خانوادگی :</label>
                                            <input type="text" class="form-control form-control-sm" placeholder="علی احمدی">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="pwd"> نام کابری :</label>
                                            <input type="text" class="form-control form-control-sm" placeholder="aliAhmadi">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="email"> رمز عبور:</label>
                                            <input type="password" class="form-control form-control-sm" placeholder="abc@123">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="pwd">  آدرس :</label>
                                            <input type="text" class="form-control form-control-sm" placeholder="کابل دشت برچی ">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="email"> شماره تماس  </label>
                                            <input type="number" class="form-control form-control-sm" placeholder="0093706909063">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="pwd"> 2 شماره تماس :</label>
                                            <input type="number" class="form-control form-control-sm" placeholder="0093706909063">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                            <option selected>جنسیت </option>
                                            <option value="1">مرد</option>
                                            <option value="2">زن </option>
                                            <option value="3">دیگر</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                            <option selected>نوع کاربر </option>
                                            <option value="1">ادمین </option>
                                            <option value="2"> کارمند </option>
                                        </select>
                                    </div>
                                </div>

                            <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" id="">  انصراف <i class="fa fa-xmark"></i></button>
                                    <button type="submit" class="btn btn-primary">ذخیره <i class="fa fa-save"></i></button>
                            </div>
                      </form>
                 </div>
            </div>
        </div>
   
@endsection
