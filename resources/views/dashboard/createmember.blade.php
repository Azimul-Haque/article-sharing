@extends('adminlte::page')

@section('title', 'Add Member')

@section('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/summernote/summernote.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/summernote/summernote-bs3.css') }}">
@stop

@section('content_header')
    <h1>
      Add Member
      <div class="pull-right">
        
      </div>
    </h1>
@stop

@section('content')
    <div class="row">
      <div class="col-md-10">
          <div class="box box-success">
            <div class="box-body">
              <form action="{{ route('dashboard.member.store') }}" method="POST" enctype='multipart/form-data' data-parsley-validate="">
                  {!! csrf_field() !!}
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group no-margin-bottom">
                          <label for="name" class="text-uppercase">Name</label>
                          <input class="form-control" type="text" name="name" id="name" required="">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group no-margin-bottom">
                          <label for="email" class="text-uppercase">Email</label>
                          <input class="form-control" type="text" name="email" id="email" required="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group no-margin-bottom">
                          <label for="phone" class="text-uppercase">Phone</label>
                          <input class="form-control" type="text" name="phone" id="phone" required="">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group no-margin-bottom">
                          <label for="designation" class="text-uppercase"> Designation</label>
                          <input class="form-control" type="text" name="designation" id="designation" required="">
                      </div>
                    </div>
                  </div>
              
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group no-margin-bottom">
                          <label for="fb" class="text-uppercase">Facebook Url</label>
                          <input class="form-control" type="text" name="fb" id="fb">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group no-margin-bottom">
                          <label for="twitter" class="text-uppercase">Twitter Url</label>
                          <input class="form-control" type="text" name="twitter" id="twitter">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group no-margin-bottom">
                          <label for="linkedin" class="text-uppercase">Linkedin Url</label>
                          <input class="form-control" type="text" name="linkedin" id="linkedin">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-8">
                            <div class="form-group no-margin-bottom">
                                <label><strong>Photo (300 X 300 &amp; 200Kb Max):</strong></label>
                                <input class="form-control" type="file" id="image" name="image" accept="image/*" required="">
                            </div>
                        </div>
                        <div class="col-md-4">
                          <img src="{{ asset('images/user.png') }}" id='img-upload' style="height: 120px; width: auto; padding: 5px;" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group no-margin-bottom">
                      <label for="bio" class="text-uppercase">Biography</label>
                      <textarea type="text" name="bio" id="bio" class="summernote" required=""></textarea>
                  </div>
                  <div class="row">
                    <div class="col-md-8">
                      <label for="bio" class="text-uppercase">Type</label><br/>
                      <label class="radio-inline"><input type="radio" name="type" value="CEO">CEO</label>
                      <label class="radio-inline"><input type="radio" name="type" value="Director">Director</label>
                      <label class="radio-inline"><input type="radio" name="type" value="Advisor">Advisor</label>
                      <label class="radio-inline"><input type="radio" name="type" value="Member" checked>Member</label>
                      <label class="radio-inline"><input type="radio" name="type" value="Content Creator" checked>Content Creator</label>
                      <label class="radio-inline"><input type="radio" name="type" value="Intern" checked>Intern</label>
                    </div>
                    <div class="col-md-4">
                      <label for="bio" class="text-uppercase">Admin Role?</label><br/>
                      <label class="radio-inline"><input type="radio" name="adminornot" value="0" checked>NO</label>
                      <label class="radio-inline"><input type="radio" name="adminornot" value="1">YES</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <br/>
                      <div class="form-group no-margin-bottom">
                          <label for="password" class="text-uppercase">Password</label>
                          <input class="form-control" type="password" name="password" id="password" autocomplete="off" required="">
                      </div>
                    </div>
                  </div>
                  <button class="btn btn-primary" type="submit">Submit</button>
              </form>
            </div>
          </div>
      </div>
    </div>
@stop

@section('js')
  <script type="text/javascript" src="{{ asset('vendor/summernote/summernote.min.js') }}"></script>
  
  <script>
      $(document).ready(function(){
          $('.summernote').summernote({
              placeholder: 'Write Biography',
              tabsize: 2,
              height: 200,
              dialogsInBody: true
          });
          $('div.note-group-select-from-files').remove();
      });
  </script>
    <script type="text/javascript">
    var _URL = window.URL || window.webkitURL;
    $(document).ready( function() {
      $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
      });

      $('.btn-file :file').on('fileselect', function(event, label) {
          var input = $(this).parents('.input-group').find(':text'),
              log = label;
          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }
      });
      function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e) {
                  $('#img-upload').attr('src', e.target.result);
              }
              reader.readAsDataURL(input.files[0]);
          }
      }
      $("#image").change(function(){
        readURL(this);
        var file, img;

        if ((file = this.files[0])) {
          img = new Image();
          img.onload = function() {
            var imagewidth = this.width;
            var imageheight = this.height;
            filesize = parseInt((file.size / 1024));
            if(filesize > 300) {
              $("#image").val('');
              toastr.warning('Filesize: '+filesize+' KB. Please upload within 300KB', 'WARNING').css('width', '400px;');
              setTimeout(function() {
                $("#img-upload").attr('src', '{{ asset('images/user.png') }}');
              }, 1000);
            }
            console.log(imagewidth/imageheight);
            if(((imagewidth/imageheight) < 0.9375) || ((imagewidth/imageheight) > 1.07142)) {
              $("#image").val('');
              toastr.warning('Raio of the photograph should be 1:1', 'WARNING').css('width', '400px;');
              setTimeout(function() {
                $("#img-upload").attr('src', '{{ asset('images/user.png') }}');
              }, 1000);
            }
          };
          img.onerror = function() {
            $("#image").val('');
            toastr.warning('Select a photograph please', 'WARNING').css('width', '400px;');
            setTimeout(function() {
              $("#img-upload").attr('src', '{{ asset('images/user.png') }}');
            }, 1000);
          };
          img.src = _URL.createObjectURL(file);
        }
      });
    });
  </script>
@stop