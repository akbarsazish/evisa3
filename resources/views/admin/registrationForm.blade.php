@extends('admin.layout')
@section('content')

<div class="container">
  <div class="row">
       <div class="col-lg-6 p-2 d-flex justify-content-start">
        <a href="tel:070007000" class="active">  <i class="fa fa-list fa-lg"></i>   فورم ثبت نام  </a>
       </div>
        <div class="col-lg-6 p-2 d-flex justify-content-end">
          <a href="tel:070007000"> <button type="button" class="btn btn-danger btn-sm"> تماس با ادمین    &nbsp; <i class="fa fa-phone"></i> </button> </a> 
        </div>
  </div>
  <div class="container registrationForm">
     <div class="row p-3">
         <div class="form-check form-switch fs-5">
                <input class="form-check-input float-start" type="checkbox" id="flexSwitchCheckChecked" checked>
                <label class="form-check-label ms-5" for="flexSwitchCheckChecked"> حالت هوشمند </label>
        </div>
     </div>
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
