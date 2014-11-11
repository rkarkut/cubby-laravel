<li class="list-group-item">

    <a href="{{ URL::route('categories.destroy', array('id' => $category->id)) }}" data-method='delete' data-confirm = 'Are you sure you want to delete this category?' style='float:right; margin-left: 5px'><span class='glyphicon glyphicon-trash'></span></a>

    <span class="badge">{{ $category->links->count() }}</span>
    {{ link_to_route('categories.show', $category->name, array('id' => $category->id), array()) }}
</li>