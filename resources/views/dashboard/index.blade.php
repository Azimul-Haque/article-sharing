@extends('adminlte::page')

@section('title', '')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    @if(Auth::user()->role == 'admin')
    	<div class="row">
    	  <div class="col-md-3 col-sm-6 col-xs-12">
    	    <a href="{{ route('dashboard.applications') }}">
    	      <div class="info-box">
    	        <span class="info-box-icon bg-aqua"><i class="fa fa-user-plus"></i></span>
    	        <div class="info-box-content">
    	          <span class="info-box-text">Applications</span>
    	          <span class="info-box-number">View List</span>
    	        </div>
    	      </div>
    	    </a>
    	  </div>
    	  <div class="col-md-3 col-sm-6 col-xs-12">
    	    <a href="{{ route('dashboard.members') }}">
    	      <div class="info-box">
    	        <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>
    	        <div class="info-box-content">
    	          <span class="info-box-text">People</span>
    	          <span class="info-box-number">View List</span>
    	        </div>
    	      </div>
    	    </a>
    	  </div>

    	  <!-- fix for small devices only -->
    	  <div class="clearfix visible-sm-block"></div>

    	  <div class="col-md-3 col-sm-6 col-xs-12">
    	    <a href="{{ route('dashboard.sliders') }}">
    	      <div class="info-box">
    	        <span class="info-box-icon bg-green"><i class="fa fa-list-alt"></i></span>
    	        <div class="info-box-content">
    	          <span class="info-box-text">Sliders</span>
    	          <span class="info-box-number">Add, Edit, Delete</span>
    	        </div>
    	      </div>
    	    </a>
    	  </div>
    	  <div class="col-md-3 col-sm-6 col-xs-12">
    	    <a href="{{ route('dashboard.strategies') }}">
    	      <div class="info-box">
    	        <span class="info-box-icon bg-yellow"><i class="fa fa-briefcase"></i></span>
    	        <div class="info-box-content">
    	          <span class="info-box-text">Strategies</span>
    	          <span class="info-box-number">View List</span>
    	        </div>
    	      </div>
    	    </a>
    	  </div>
    	</div>

    	<div class="row">
    	  <div class="col-md-3 col-sm-6 col-xs-12">
    	    <a href="{{ route('dashboard.expertises') }}">
    	      <div class="info-box">
    	        <span class="info-box-icon bg-aqua"><i class="fa fa-flask"></i></span>
    	        <div class="info-box-content">
    	          <span class="info-box-text">Research Expertises</span>
    	          <span class="info-box-number">View List</span>
    	        </div>
    	      </div>
    	    </a>
    	  </div>
    	  <div class="col-md-3 col-sm-6 col-xs-12">
    	    <a href="{{ route('dashboard.projects') }}">
    	      <div class="info-box">
    	        <span class="info-box-icon bg-red"><i class="fa fa-cogs"></i></span>
    	        <div class="info-box-content">
    	          <span class="info-box-text">Projects</span>
    	          <span class="info-box-number">View List</span>
    	        </div>
    	      </div>
    	    </a>
    	  </div>

    	  <!-- fix for small devices only -->
    	  <div class="clearfix visible-sm-block"></div>

    	  <div class="col-md-3 col-sm-6 col-xs-12">
    	    <a href="{{ route('dashboard.publications.pending') }}">
    	      <div class="info-box">
    	        <span class="info-box-icon bg-green"><i class="fa fa-hourglass-half"></i></span>
    	        <div class="info-box-content">
    	          <span class="info-box-text">Pending Publications</span>
    	          <span class="info-box-number">Add, Edit, Delete</span>
    	        </div>
    	      </div>
    	    </a>
    	  </div>
    	  <div class="col-md-3 col-sm-6 col-xs-12">
    	    <a href="{{ route('dashboard.publications') }}">
    	      <div class="info-box">
    	        <span class="info-box-icon bg-yellow"><i class="fa fa-book"></i></span>
    	        <div class="info-box-content">
    	          <span class="info-box-text"> Publications</span>
    	          <span class="info-box-number">View List</span>
    	        </div>
    	      </div>
    	    </a>
    	  </div>
    	</div>

    	<div class="row">
    	  <div class="col-md-3 col-sm-6 col-xs-12">
    	    <a href="{{ route('dashboard.disasterdatas') }}">
    	      <div class="info-box">
    	        <span class="info-box-icon bg-aqua"><i class="fa fa-tree"></i></span>
    	        <div class="info-box-content">
    	          <span class="info-box-text">Disaster Data</span>
    	          <span class="info-box-number">View List</span>
    	        </div>
    	      </div>
    	    </a>
    	  </div>
    	  <div class="col-md-3 col-sm-6 col-xs-12">
    	    {{-- <a href="{{ route('dashboard.members') }}">
    	      <div class="info-box">
    	        <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>
    	        <div class="info-box-content">
    	          <span class="info-box-text">Projects</span>
    	          <span class="info-box-number">View List</span>
    	        </div>
    	      </div>
    	    </a> --}}
    	  </div>

    	  <!-- fix for small devices only -->
    	  <div class="clearfix visible-sm-block"></div>

    	  <div class="col-md-3 col-sm-6 col-xs-12">
    	    {{-- <a href="{{ route('dashboard.sliders') }}">
    	      <div class="info-box">
    	        <span class="info-box-icon bg-green"><i class="fa fa-list-alt"></i></span>
    	        <div class="info-box-content">
    	          <span class="info-box-text">Pending Publications</span>
    	          <span class="info-box-number">Add, Edit, Delete</span>
    	        </div>
    	      </div>
    	    </a> --}}
    	  </div>
    	  <div class="col-md-3 col-sm-6 col-xs-12">
    	    {{-- <a href="{{ route('dashboard.strategies') }}">
    	      <div class="info-box">
    	        <span class="info-box-icon bg-yellow"><i class="fa fa-briefcase"></i></span>
    	        <div class="info-box-content">
    	          <span class="info-box-text"> Publications</span>
    	          <span class="info-box-number">View List</span>
    	        </div>
    	      </div>
    	    </a> --}}
    	  </div>
    	</div>

    	<h4>Member Activity</h4>
    @endif
    
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="{{ route('dashboard.personal.profile') }}">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Your Profile</span>
              <span class="info-box-number">Edit, Update</span>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="{{ route('dashboard.personal.pubs') }}">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-files-o"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Your Publications</span>
              <span class="info-box-number">Submit Publication</span>
            </div>
          </div>
        </a>
      </div>

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        {{-- <a href="{{ route('dashboard.sliders') }}">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-list-alt"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Pending Publications</span>
              <span class="info-box-number">Add, Edit, Delete</span>
            </div>
          </div>
        </a> --}}
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        {{-- <a href="{{ route('dashboard.strategies') }}">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-briefcase"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"> Publications</span>
              <span class="info-box-number">View List</span>
            </div>
          </div>
        </a> --}}
      </div>
    </div> 
    
@stop