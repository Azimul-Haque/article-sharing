@extends('adminlte::page')

@section('title', 'Research Expertises')

@section('css')

@stop

@section('content_header')
    <h1>
      Research Expertises
      <div class="pull-right">
        <a href="{{ route('dashboard.expertise.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Expertise</a>
      </div>
    </h1>
@stop

@section('content')
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th width="25%">Title</th>
          <th>Description</th>
          <th width="20%">Image</th>
          <th width="10%">Action</th>
        </tr>
      </thead>
      <tbody>
        @php $addmodalflag = 0; $editmodalflag = 0; @endphp
        @foreach($expertises as $expertise)
        <tr>
          <td>{{ $expertise->title }}</td>
          <td><span class="">{{ substr(strip_tags($expertise->description), 0, 100) }}...</span></td>
          <td>
            @if($expertise->image != null)
            <img src="{{ asset('images/expertises/'.$expertise->image)}}" style="height: 70px; width: auto;" />
            @else
            <img src="{{ asset('images/abc.png')}}" style="height: 70px; width: auto;" />
            @endif
          </td>
          <td>
            <a href="{{ route('dashboard.expertise.edit', $expertise->id) }}" class="btn btn-sm btn-success" title="Edit Expertise"><i class="fa fa-pencil"></i></a>
            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{ $expertise->id }}" data-backdrop="static" title="Delete Expertise"><i class="fa fa-trash-o"></i></button>
            <!-- Delete Modal -->
            <!-- Delete Modal -->
            <div class="modal fade" id="deleteModal{{ $expertise->id }}" role="dialog">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="modal-header modal-header-danger">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delete Expretise</h4>
                  </div>
                  <div class="modal-body">
                    Confirm Delete this Expretise?
                  </div>
                  <div class="modal-footer">
                    {!! Form::model($expertise, ['route' => ['dashboard.expertise.delete', $expertise->id], 'method' => 'DELETE', 'class' => 'form-default', 'enctype' => 'multipart/form-data']) !!}
                        {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    {!! Form::close() !!}
                  </div>
                </div>
              </div>
            </div>
            <!-- Delete Modal -->
            <!-- Delete Modal -->
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div>
    {{ $expertises->links() }}
  </div>    
@stop

@section('js')

@stop