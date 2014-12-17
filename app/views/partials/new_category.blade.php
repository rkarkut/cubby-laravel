<div class="modal fade" id="addNewCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    {{ Form::open(array('route' => 'categories.store', 'method' => 'post')) }}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add new category</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter category name">
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="parent_id">
                        <option value="0">Main Category</option>
                        @forelse($_categories as $_category)
                            <option value="{{$_category->id}}">@for($i = 0; $i < $_category->depth; $i++)&nbsp;&nbsp;&nbsp;@endfor{{$_category->name}}</option>
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