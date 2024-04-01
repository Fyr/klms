<?
    $id = $this->request->data($objectType.'.id');
    $title = __('Settings');
    $breadcrumbs = array(
        $title => 'javascript:;',
        $this->ObjectType->getTitle('index', $objectType) => array('action' => 'index'),
        __('Edit') => ''
    );
    echo $this->element('AdminUI/breadcrumbs', compact('breadcrumbs'));
    echo $this->element('AdminUI/title', compact('title'));
    echo $this->Flash->render();
?>

<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">

<?
    echo $this->element('AdminUI/form_title', array('title' => $this->ObjectType->getTitle($id ? 'edit' : 'create', $objectType)));
    echo $this->PHForm->create($objectType);

    echo $this->PHForm->hidden('id');
	echo $this->PHForm->hidden('marker_x');
	echo $this->PHForm->hidden('marker_y');
	$map_images = $this->Html->image('/img/regions/regions_all.png', array('class' => 'map-region'))
		.$this->Html->image('/img/point.png', array('id' => 'marker', 'style' => 'position: absolute; left: 0px; top; 0px;'));

    $removeMarkerLink = $this->Html->link(__('here'), 'javascript:;', array('onclick' => 'delMarker()'));
    $tabs = array(
        __('General') => $this->Html->div('form-body',
            $this->PHForm->input('title')
            .$this->PHForm->input('marker_title')
            .$this->PHForm->input('sorting', array('class' =>'form-control input-small'))
        ),
        __('Map') => $this->Html->div('form-body',
            $this->Html->div('', 
                __('Click on map to set up a marker').'<br/>'
                .__('Click %s, to remove marker', $removeMarkerLink), 
                array('style' => 'position: absolute; z-index: 1')
            )
            .$this->Html->div('map-images', $map_images, array('style' => 'position: relative;'))
        )
    );

    echo $this->element('AdminUI/tabs', compact('tabs'));
    echo $this->element('AdminUI/form_actions');
    echo $this->PHForm->end();
?>
        </div>
    </div>
</div>
<script>
function cssPx(e, prop, val) {
	var px = parseInt($(e).css(prop).replace(/px/, ''));
	if (typeof(val) != 'undefined') {
		$(e).css(prop, val + 'px');
	}
	return px;
}
function placeMarker(pos) {
	cssPx('#marker', 'left', pos.x);
	cssPx('#marker', 'top', pos.y);

	$('#RegionMarkerX').val(pos.x);
	$('#RegionMarkerY').val(pos.y);

	if (pos.x && pos.y) {
		$('#marker').show();
	} else {
		$('#marker').hide();
	}
}
function delMarker() {
	placeMarker({x: 0, y: 0});
}
$(function(){
	placeMarker({x: <?=intval($this->request->data('Region.marker_x'))?>, y: <?=intval($this->request->data('Region.marker_y'))?>});
	$('.map-region').click(function(e){
		var div = $('.map-images').get(0).getBoundingClientRect();
		var pos = {x: e.pageX - parseInt(div.left) - 8, y: e.pageY - parseInt(div.top) - 8};
		placeMarker(pos);
	});
});
</script>