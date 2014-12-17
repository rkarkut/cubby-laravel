<div class="modal fade" id="addNewLink" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    {{ Form::open(array('route' => 'links.store', 'method' => 'post')) }}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add new link</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <input type="text" name="url" class="form-control" data-action="get-link-title" id="link_url" placeholder="Enter URL">
                    </div>

                    <div class="form-group">
                        <input type="text" name="title" class="form-control" id="link_title" placeholder="Enter title">
                    </div>

                    <input type="hidden" name="current_category" value="{{ $category->id }}" />

                    <div class="form-group">
                        <select name="category" class="form-control">
                        @forelse($_categories as $_category)
                            <option value="{{$_category->id}}" @if($_category->id == $category->id) selected="selected"@endif>@for($i = 0; $i < $_category->depth; $i++)&nbsp;&nbsp;&nbsp;@endfor{{$_category->name}}</option>
                        @empty
                            <option value="">Categories not found!</option>
                        @endforelse
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-success">Save</button>
                </div>
            </div>
        </div>
    {{ Form::close() }}
</div>