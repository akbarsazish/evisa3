@extends('admin.layout')
@section('content')

<div class="container-fluid bg-white mt-2 rounded-2">
    <div class="row mt-1">
        <h4 class="title">  لیست اسناد @if(isset($flag)) ({{$branChName}} ) @endif</h4>
    </div>
      <div class="row mt-2">
            <div class="col-lg-3">
                    <div class="mb-3">
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option selected> فلتر اسناد </option>
                        <option value="1"> تایید شده </option>
                        <option value="1">تایید ناشده </option>
                        <option value="1"> رد شده </option>
                    </select>
                </div>
            </div> 
            <div class="col-lg-9 text-end">
                <form action="{{url('/docsDetails')}}" method="get" style="display:inline;">
                    <input type="hidden" id="docDetailsInp" name="docID">
                <button type="submit" class="btn btn-sm btn-success" id="docDetailsBtn">جزءیات سند<i class="fa fa-check"></i> </button> &nbsp;
                </form>

                @if(Session::get("userSession")==1 or Session::get("userSession")==2)
                    <button type="button" class="btn btn-sm btn-info" id="printDocumentBtn"> چاپ <i class="fa fa-print"></i> </button> &nbsp;
                    <button type="button" class="btn btn-sm btn-success" id="okeDocumentBtn"> تایید <i class="fa fa-check"></i> </button> &nbsp;

                    <button type="button" class="btn btn-sm btn-dark" id="rejectDocumentBtn"> ردکردن <i class="fa fa-xmark"></i> </button> &nbsp;
                @endif
                    <button type="button" class="btn btn-sm btn-warning" id="editDocumentBtn"> ویرایش <i class="fa fa-edit"></i> </button> &nbsp;
                    <button type="button" class="btn btn-sm btn-danger" id="deleteDocumentBtn"> حذف <i class="fa fa-trash"></i> </button>
            </div>
        </div>

    <div class="row">
        <div class="col-lg-12 ">
            <input type="hidden" id="selectedDocID">

                    @if(Session::get("userSession")==1 or Session::get("userSession")==2)
                    <table class="table table-bordered select-highlight evisaDataTable">
              <thead>
                    <tr class="docsTr">
                        <th> ردیف </th>
                        <th> نام و نام خانوادگی </th>
                        <th>  تاریخ تولد </th>
                        <th>  محل تولد </th>
                        <th> شماره پاسپورت  </th>
                        <th>  انقضا پاسپورت   </th>
                        <th>  شماره تماس </th>
                        <th> کد رهگیری  </th>
                        <th>  شرکت </th>
                        <th> تاریخ مراجعه  </th>
                        <th> انتخاب </th>
                    </tr>
                </thead>
                <tbody id="docListBody">
                    @foreach($documents as $doc)
                    <tr class="docsTr" 
                            @if($doc->isOke ==2) style="background-color:#c1c1c1!important;" @endif
                            @if($doc->isOke ==1) style="background-color:#95bde5!important;" @endif
                       onclick="selectTableTrDocs(this)">
                            <th  >{{$loop->iteration}}</th>
                            <td>{{$doc->dName}} {{$doc->LastName}}</td>
                            <td>{{$doc->BirthDate}}</td>
                            <td>{{$doc->countryName}}</td>
                            <td>{{$doc->PassNo}}</td>
                            <td>{{$doc->PassEndDate}}</td>
                            <td>{{$doc->dCellPhone}}</td>
                            <td>{{$doc->RefCode}}</td>
                            <td>{{$doc->branchName}}</td>
                            <td>{{$doc->referDate}}</td>
                            <td>
                                <span class="form-check">
                                    <input class="form-check-input " type="radio" name="exampleRadios" id="exampleRadios2" value="{{$doc->DocSn}}">
                                </span>
                            </td>
                    </tr>
                    @endforeach
                    </tbody>
             </table>
                    @else
                    <table class="table table-bordered select-highlight evisaDataTable">
              <thead>
                    <tr class="docsTr">
                        <th> ردیف </th>
                        <th>نام </th>
                        <th>نام خانودگی</th>
                        <th>نام پدر </th>
                        <th>  تاریخ تولد </th>
                        <th>  محل تولد </th>
                        <th> شماره پاسپورت  </th>
                        <th>  انقضا پاسپورت   </th>
                        <th>  شماره تماس </th>
                        <th>  شماره تماس فامیل</th>
                        <th> کد رهگیری  </th>
                        <th> تاریخ مراجعه  </th>
                        <th> انتخاب </th>
                    </tr>
                </thead>
                <tbody id="docListBody">
                    @foreach($documents as $doc)
                    <tr class="docsTr" onclick="selectTableTrDocs(this)">
                            <th>{{$loop->iteration}}</th>
                            <td>{{$doc->dName}}</td>
                            <td>{{$doc->LastName}}</td>
                            <td>{{$doc->FatherName}}</td>
                            <td>{{$doc->BirthDate}}</td>
                            <td>{{$doc->countryName}}</td>
                            <td>{{$doc->PassNo}}</td>
                            <td>{{$doc->PassEndDate}}</td>
                            <td>{{$doc->dCellPhone}}</td>
                            <td>{{$doc->dOtherPhone}}</td>
                            <td>{{$doc->RefCode}}</td>
                            <td>{{$doc->referDate}}</td>
                            <td>
                                <span class="form-check">
                                    <input class="form-check-input " type="radio" name="exampleRadios" id="exampleRadios2" value="{{$doc->DocSn}}">
                                </span>
                            </td>
                    </tr>
                    @endforeach
                    @endif
                   
                </tbody>
             </table>
        </div>
    </div>
  </div>


  <!--- modal for editing docs list -->
  <div class="modal fade" id="editDocsList" data-bs-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
						<button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                        <h5 class="modal-title " id="exampleModalLabel"> ویرایش سند </h5>
                    </div>
                         <div class="modal-body">
                         <form action="{{url('/editDoc')}}" method="Post" enctype="multipart/form-data" >
                            @csrf
                          <div class="row mt-3"> 
                          <div class="col-lg-3 col-md-3 col-sm-6">
                                    <fieldset class="upload_dropZone text-center mb-3 p-4">
                                        <legend class="visually-hidden"> پاسپورت </legend>
                                            <svg class="upload_svg" width="60" height="100" aria-hidden="true">
                                                <use href="#icon-imageUpload"></use>
                                            </svg>
                                            <p class="small my-2">Drag &amp; Drop background passport inside dashed region<br><i>or click</i></p>
                                            <input id="upload_image_background" name="passImage" data-post-name="image_background" data-post-url="https://someplace.com/image/uploads/backgrounds/" class="position-absolute invisible" type="file" multiple accept="image/jpeg, image/png, image/svg+xml" />
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
                                            <input id="personImage" name="personImage" data-post-name="image_background" data-post-url="https://someplace.com/image/uploads/backgrounds/" class="position-absolute invisible" type="file" multiple accept="image/jpeg, image/png, image/svg+xml" />
                                            <label class="btn btn-upload btn-sm mb-2" for="personImage">  عکس شخص </label>
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
                                            <input id="tazkeraImage" name="tazkiraImage" data-post-name="image_background" data-post-url="https://someplace.com/image/uploads/backgrounds/" class="position-absolute invisible" type="file" multiple accept="image/jpeg, image/png, image/svg+xml" />
                                            <label class="btn btn-upload btn-sm mb-2" for="tazkeraImage"> تذکره </label>
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
                                            <input type="hidden" name="docID" id="DocId">
                                                <label for="exampleFormControlInput1" class="form-label"> شماره پاسپورت </label>
                                                <input type="text" class="form-control form-control-sm" name="passNo" id="PassNo" placeholder="P01918533">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label"> نام </label>
                                                <input type="text" class="form-control form-control-sm" name="name" id="Name" placeholder="احمد">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label"> نام خانواده گی </label>
                                                <input type="text" class="form-control form-control-sm" name="lastName" id="LastName" placeholder="احمدی">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">  نام پدر </label>
                                                <input type="text" class="form-control form-control-sm" name="fatherName" id="FatherName" placeholder="P01918533">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label"> تاریخ تولد </label>
                                                <input type="date" class="form-control form-control-sm" name="birthDate" id="BirthDate" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label"> محل تولد  </label>
                                                <select class="form-select form-select-sm" name="birthPlace" aria-label=".form-select-sm example" id="BirthPlace">
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
                                                <select class="form-select form-select-sm" name="gender" aria-label=".form-select-sm example" id="sex">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">  تاریخ ختم پاسپورت   </label>
                                                <input type="date" class="form-control form-control-sm" name="passEndDate" id="PassEndDate"  placeholder="P01918533">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label"> شماره تماس (همراه) </label>
                                                <input type="number" class="form-control form-control-sm" name="cellPhone" id="CellPhone" placeholder="+93 706909063">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label"> شماره تماس (بستگان) </label>
                                                <input type="number" class="form-control form-control-sm" name="otherPhone" id="OtherPhone" placeholder="+93 706909063">
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">  کد رهگیری   </label>
                                                <input type="number" class="form-control form-control-sm" name="refCode" id="RefCode" placeholder="P01918533">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label"> تاریخ مراجعه </label>
                                                <input type="date" class="form-control form-control-sm" name="referDate" id="ReferDate" placeholder="+93 706909063">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">آدرس</label>
                                                <input type="text" class="form-control form-control-sm" name="userAddress" id="PersonAddress" placeholder="آدرس">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-danger" id="">انصراف<i class="fa fa-xmark"></i></button>
                                <button type="submit" class="btn btn-sm btn-primary">ذخیره <i class="fa fa-save"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>

console.clear();
('use strict');

// Drag and drop - single or multiple image files
(function () {

  'use strict';
  
  // Four objects of interest: drop zones, input elements, gallery elements, and the files.
  // dataRefs = {files: [image files], input: element ref, gallery: element ref}

  const preventDefaults = event => {
    event.preventDefault();
    event.stopPropagation();
  };

  const highlight = event =>
    event.target.classList.add('highlight');
  
  const unhighlight = event =>
    event.target.classList.remove('highlight');

  const getInputAndGalleryRefs = element => {
    const zone = element.closest('.upload_dropZone') || false;
    const gallery = zone.querySelector('.upload_gallery') || false;
    const input = zone.querySelector('input[type="file"]') || false;
    return {input: input, gallery: gallery};
  }

  const handleDrop = event => {
    const dataRefs = getInputAndGalleryRefs(event.target);
    dataRefs.files = event.dataTransfer.files;
    handleFiles(dataRefs);
  }


  const eventHandlers = zone => {
    const dataRefs = getInputAndGalleryRefs(zone);
    if (!dataRefs.input) return;

    // Prevent default drag behaviors
    ;['dragenter', 'dragover', 'dragleave', 'drop'].forEach(event => {
      zone.addEventListener(event, preventDefaults, false);
      document.body.addEventListener(event, preventDefaults, false);
    });

    // Highlighting drop area when item is dragged over it
    ;['dragenter', 'dragover'].forEach(event => {
      zone.addEventListener(event, highlight, false);
    });
    ;['dragleave', 'drop'].forEach(event => {
      zone.addEventListener(event, unhighlight, false);
    });

    // Handle dropped files
    zone.addEventListener('drop', handleDrop, false);

    // Handle browse selected files
    dataRefs.input.addEventListener('change', event => {
      dataRefs.files = event.target.files;
      handleFiles(dataRefs);
    }, false);

  }


  // Initialise ALL dropzones
  const dropZones = document.querySelectorAll('.upload_dropZone');
  for (const zone of dropZones) {
    eventHandlers(zone);
  }

  // No 'image/gif' or PDF or webp allowed here, but it's up to your use case.
  // Double checks the input "accept" attribute
  const isImageFile = file => 
    ['image/jpeg', 'image/png', 'image/svg+xml'].includes(file.type);

  function previewFiles(dataRefs) {
    if (!dataRefs.gallery) return;
    for (const file of dataRefs.files) {
      let reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onloadend = function() {
        let img = document.createElement('img');
        img.className = 'upload_img mt-2';
        img.setAttribute('alt', file.name);
        img.src = reader.result;
        dataRefs.gallery.appendChild(img);
      }
    }
  }

  // Based on: https://flaviocopes.com/how-to-upload-files-fetch/
  const imageUpload = dataRefs => {
    // Multiple source routes, so double check validity
    if (!dataRefs.files || !dataRefs.input) return;

    const url = dataRefs.input.getAttribute('data-post-url');
    if (!url) return;

    const name = dataRefs.input.getAttribute('data-post-name');
    if (!name) return;

    const formData = new FormData();
    formData.append(name, dataRefs.files);

    fetch(url, {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      console.log('posted: ', data);
      if (data.success === true) {
        previewFiles(dataRefs);
      } else {
        console.log('URL: ', url, '  name: ', name)
      }
    })
    .catch(error => {
      console.error('errored: ', error);
    });
  }


  // Handle both selected and dropped files
  const handleFiles = dataRefs => {
    let files = [...dataRefs.files];

    // Remove unaccepted file types
    files = files.filter(item => {
      if (!isImageFile(item)) {
        console.log('Not an image, ', item.type);
      }
      return isImageFile(item) ? item : null;
    });

    if (!files.length) return;
    dataRefs.files = files;

    previewFiles(dataRefs);
    imageUpload(dataRefs);
  }

})();

</script>
@endsection
