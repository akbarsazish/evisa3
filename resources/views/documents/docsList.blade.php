@extends('admin.layout')
@section('content')

<div class="container bg-white mt-2 rounded-2">
    <div class="row mt-1">
        <h4 class="title"> لیست اسناد  </h4>
    </div>
      <div class="row mt-2">
                <div class="col-lg-3">
                        <div class="mb-3">
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected> فلتر اسناد </option>
                            <option value="1"> تایید شده </option>
                            <option value="1">معلق </option>
                            <option value="1"> رد شده </option>
                        </select>
                    </div>
                </div>
           
                <div class="col-lg-9 text-end">
                     <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editDocsList"> ویرایش <i class="fa fa-edit"></i> </button> &nbsp;
                     <button type="button" class="btn btn-sm btn-danger" id="deleteDocumentBtn"> حذف <i class="fa fa-trash"></i> </button>
                </div>
        </div>

    <div class="row">
        <div class="col-lg-12 ">
            <table class="table table-bordered select-highlight evisaDataTable">
              <thead>
                    <tr class="docsTr">
                        <th> ردیف </th>
                        <th>نام </th>
                        <th>نام خانودگی</th>
                        <th>نام پدر </th>
                        <th>  تاریخ تولد </th>
                        <th>  محل تولد </th>
                        <th>  تذکره  </th>
                        <th> شماره پاسپورت  </th>
                        <th>  انقضا پاسپورت   </th>
                        <th>  شماره تماس </th>
                        <th> کد رهگیری  </th>
                        <th>  آدرس  </th>
                        <th> تاریخ مراجعه  </th>
                        <th> انتخاب </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="docsTr"  onclick="selectTableTr(this)">
                            <th>1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>
                                <span class="form-check">
                                    <input class="form-check-input " type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                </span>
                            </td>
                    </tr>
                    <tr class="docsTr"  onclick="selectTableTr(this)">
                            <th>2</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>
                                <span class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                </span>
                            </td>
                    </tr>
                   
                </tbody>
             </table>
        </div>
    </div>
    </div>



    
  <!--- modal for editing docs list -->
  <div class="modal" id="editDocsList" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel">
            <div class="modal-dialog modal-dialog-scrollable modal-lg ">
                <div class="modal-content">
                    <div class="modal-header">
						<button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                        <h5 class="modal-title" id="exampleModalLabel"> افزودن کامنت </h5>
                    </div>
                         <div class="modal-body">
                         <form action="" >
                          <div class="row mt-3"> 
                            
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                    <fieldset class="upload_dropZone text-center mb-3 p-4">
                                        <legend class="visually-hidden"> پاسپورت </legend>
                                            <svg class="upload_svg" width="60" height="100" aria-hidden="true">
                                                <use href="#icon-imageUpload"></use>
                                            </svg>
                                            <p class="small my-2">Drag &amp; Drop background passport inside dashed region<br><i>or click</i></p>
                                            <input id="upload_image_background" data-post-name="image_background" data-post-url="https://someplace.com/image/uploads/backgrounds/" class="position-absolute invisible" type="file" multiple accept="image/jpeg, image/png, image/svg+xml" />
                                            <label class="btn btn-upload mb-3" for="upload_image_background">  پاسپورت </label>
                                        <div class="upload_gallery d-flex flex-wrap justify-content-center gap-3 mb-0"></div>
                                    </fieldset>
                                    <svg style="display:none">
                                        <defs>
                                            <symbol id="icon-imageUpload" clip-rule="evenodd" viewBox="0 0 96 96">
                                            <path d="M47 6a21 21 0 0 0-12.3 3.8c-2.7 2.1-4.4 5-4.7 7.1-5.8 1.2-10.3 5.6-10.3 10.6 0 6 5.8 11 13 11h12.6V22.7l-7.1 6.8c-.4.3-.9.5-1.4.5-1 0-2-.8-2-1.7 0-.4.3-.9.6-1.2l10.3-8.8c.3-.4.8-.6 1.3-.6.6 0 1 .2 1.4.6l10.2 8.8c.4.3.6.8.6 1.2 0 1-.9 1.7-2 1.7-.5 0-1-.2-1.3-.5l-7.2-6.8v15.6h14.4c6.1 0 11.2-4.1 11.2-9.4 0-5-4-8.8-9.5-9.4C63.8 11.8 56 5.8 47 6Zm-1.7 42.7V38.4h3.4v10.3c0 .8-.7 1.5-1.7 1.5s-1.7-.7-1.7-1.5Z M27 49c-4 0-7 2-7 6v29c0 3 3 6 6 6h42c3 0 6-3 6-6V55c0-4-3-6-7-6H28Zm41 3c1 0 3 1 3 3v19l-13-6a2 2 0 0 0-2 0L44 79l-10-5a2 2 0 0 0-2 0l-9 7V55c0-2 2-3 4-3h41Z M40 62c0 2-2 4-5 4s-5-2-5-4 2-4 5-4 5 2 5 4Z"/>
                                            </symbol>
                                        </defs>
                                    </svg>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="row">
                                    <fieldset class="upload_dropZone text-center mb-1 p-2">
                                        <legend class="visually-hidden">آپلود فایل </legend>
                                            <svg class="upload_svg" width="30" height="30" aria-hidden="true">
                                                <use href="#icon-imageUpload"></use>
                                            </svg>
                                            <p class="small my-2">Drag &amp; Drop background passport inside dashed region<br><i>or click</i></p>
                                            <input id="upload_image_background" data-post-name="image_background" data-post-url="https://someplace.com/image/uploads/backgrounds/" class="position-absolute invisible" type="file" multiple accept="image/jpeg, image/png, image/svg+xml" />
                                            <label class="btn btn-upload btn-sm mb-2" for="upload_image_background">  عکس شخص </label>
                                        <div class="upload_gallery d-flex flex-wrap justify-content-center gap-3 mb-0"></div>
                                    </fieldset>
                                    <svg style="display:none">
                                        <defs>
                                            <symbol id="icon-imageUpload" clip-rule="evenodd" viewBox="0 0 96 96">
                                            <path d="M47 6a21 21 0 0 0-12.3 3.8c-2.7 2.1-4.4 5-4.7 7.1-5.8 1.2-10.3 5.6-10.3 10.6 0 6 5.8 11 13 11h12.6V22.7l-7.1 6.8c-.4.3-.9.5-1.4.5-1 0-2-.8-2-1.7 0-.4.3-.9.6-1.2l10.3-8.8c.3-.4.8-.6 1.3-.6.6 0 1 .2 1.4.6l10.2 8.8c.4.3.6.8.6 1.2 0 1-.9 1.7-2 1.7-.5 0-1-.2-1.3-.5l-7.2-6.8v15.6h14.4c6.1 0 11.2-4.1 11.2-9.4 0-5-4-8.8-9.5-9.4C63.8 11.8 56 5.8 47 6Zm-1.7 42.7V38.4h3.4v10.3c0 .8-.7 1.5-1.7 1.5s-1.7-.7-1.7-1.5Z M27 49c-4 0-7 2-7 6v29c0 3 3 6 6 6h42c3 0 6-3 6-6V55c0-4-3-6-7-6H28Zm41 3c1 0 3 1 3 3v19l-13-6a2 2 0 0 0-2 0L44 79l-10-5a2 2 0 0 0-2 0l-9 7V55c0-2 2-3 4-3h41Z M40 62c0 2-2 4-5 4s-5-2-5-4 2-4 5-4 5 2 5 4Z"/>
                                            </symbol>
                                        </defs>
                                    </svg>
                                </div>
                                <div class="row">
                                    <fieldset class="upload_dropZone text-center mb-1 p-2">
                                        <legend class="visually-hidden">آپلود فایل </legend>
                                            <svg class="upload_svg" width="30" height="30" aria-hidden="true">
                                                <use href="#icon-imageUpload"></use>
                                            </svg>
                                            <p class="small my-2">Drag &amp; Drop background passport inside dashed region<br><i>or click</i></p>
                                            <input id="upload_image_background" data-post-name="image_background" data-post-url="https://someplace.com/image/uploads/backgrounds/" class="position-absolute invisible" type="file" multiple accept="image/jpeg, image/png, image/svg+xml" />
                                            <label class="btn btn-upload btn-sm mb-2" for="upload_image_background"> تذکره </label>
                                        <div class="upload_gallery d-flex flex-wrap justify-content-center gap-3 mb-0"></div>
                                    </fieldset>
                                    <svg style="display:none">
                                        <defs>
                                            <symbol id="icon-imageUpload" clip-rule="evenodd" viewBox="0 0 96 96">
                                            <path d="M47 6a21 21 0 0 0-12.3 3.8c-2.7 2.1-4.4 5-4.7 7.1-5.8 1.2-10.3 5.6-10.3 10.6 0 6 5.8 11 13 11h12.6V22.7l-7.1 6.8c-.4.3-.9.5-1.4.5-1 0-2-.8-2-1.7 0-.4.3-.9.6-1.2l10.3-8.8c.3-.4.8-.6 1.3-.6.6 0 1 .2 1.4.6l10.2 8.8c.4.3.6.8.6 1.2 0 1-.9 1.7-2 1.7-.5 0-1-.2-1.3-.5l-7.2-6.8v15.6h14.4c6.1 0 11.2-4.1 11.2-9.4 0-5-4-8.8-9.5-9.4C63.8 11.8 56 5.8 47 6Zm-1.7 42.7V38.4h3.4v10.3c0 .8-.7 1.5-1.7 1.5s-1.7-.7-1.7-1.5Z M27 49c-4 0-7 2-7 6v29c0 3 3 6 6 6h42c3 0 6-3 6-6V55c0-4-3-6-7-6H28Zm41 3c1 0 3 1 3 3v19l-13-6a2 2 0 0 0-2 0L44 79l-10-5a2 2 0 0 0-2 0l-9 7V55c0-2 2-3 4-3h41Z M40 62c0 2-2 4-5 4s-5-2-5-4 2-4 5-4 5 2 5 4Z"/>
                                            </symbol>
                                        </defs>
                                    </svg>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label"> شماره پاسپورت </label>
                                                <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="P01918533">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label"> نام </label>
                                                <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="احمد">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label"> نام خانواده گی </label>
                                                <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="احمدی">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">  نام پدر </label>
                                                <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="P01918533">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label"> تاریخ تولد </label>
                                                <input type="date" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label"> محل تولد  </label>
                                                <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                                    <option selected> افغانستان</option>
                                                    <option value="1">ایران</option>
                                                    <option value="2">پاکستان</option>
                                                    <option value="3"> ترکیه  </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label"> جنسیت </label>
                                                <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                                    <option selected> مرد </option>
                                                    <option value="1"> زن </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">  تاریخ ختم پاسپورت   </label>
                                                <input type="date" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="P01918533">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label"> شماره تماس (همراه) </label>
                                                <input type="number" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="+93 706909063">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label"> شماره تماس (بستگان) </label>
                                                <input type="number" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="+93 706909063">
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">  کد رهگیری   </label>
                                                <input type="number" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="P01918533">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label"> تاریخ مراجعه </label>
                                                <input type="date" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="+93 706909063">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label"> آدرس   </label>
                                                <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="آدرس">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                        
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-danger" id="">انصراف<i class="fa fa-xmark"></i></button>
                                <button type="submit" class="btn btn-primary">ذخیره <i class="fa fa-save"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
   
@endsection