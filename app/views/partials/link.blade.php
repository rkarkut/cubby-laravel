<li class="list-group-item">
    <img src="http://www.google.com/s2/favicons?domain={{ $link->url }}" width="16" height="16" />
    {{ link_to_route('links.show', $link->title, array('id' => $link->id), array()) }}
    
    <a href="{{ URL::route('links.destroy', array('id' => $link->id)) }}" data-method='delete' data-confirm = 'Are you sure you want to delete this link?' style='float:right'><span class='glyphicon glyphicon-trash'></span></a>

    @if ($link->is_waiting)
        <a title="remove from waiting list" href="#" data-id="{{ $link->id }}" data-action="add-to-waiting-list" style="float: right; margin: 0 15px 0 0"><span class="glyphicon glyphicon-pushpin" style="color: orange"></span></a>
    @else
        <a title="add to waiting list" href="#" data-id="{{ $link->id }}" data-action="add-to-waiting-list" style="float: right; margin: 0 15px 0 0"><span class="glyphicon glyphicon-pushpin" style="color: gray"></span></a>
    @endif
</li>